<?php

namespace App\Http\Controllers\LojaABC;

use App\Commands\CancelSaleCommand;
use App\Commands\CommandBus;
use App\Commands\CreateSaleCommand;
use App\Helpers\Helper;
use App\Http\Controllers\ApiError;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Exception;
use App\Models\LojaABC\SaleItems;
use App\Models\LojaABC\Sales;
use App\Queries\GetSales;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if(isset($request['sales_id']) and !empty($request['sales_id'])){
            return $this->show($request['sales_id']);
        }
        $sales = Helper::arrayToObject(GetSales::getData());

        /**
         * TODO: Facade Validation dates, if don't recieved parameters search just today
         */

        foreach ($sales as $sale){
            $sale->products = SaleItems::getItems($sale->sales_id);
        }

        return response()->json($sales);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $sales = \App\Helpers\Helper::arrayToObject($request->all());

        foreach ($sales as $sale) {

            if(isset($sale->products) and !empty($sale->products)){

                $command = new CreateSaleCommand(
                    $sale->sales_id,
                    $sale->amount
                );
                $commandBus = new CommandBus();
                $commandBus->handle($command);

                SaleItems::putItems($sale->sales_id, $sale->products);

                Sales::calTotal($sale->sales_id,$request);
                /**
                 * TODO: Facade validator total greater zero
                 */
            }
        }

        return response([
            'message' => ['Success! All records has been inserted.'],
            'sales' => $request->all()
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $sale = Helper::arrayToObject(GetSales::getData($id));

        if (!$sale){
            return response([
                'message' => ['This order do not match our records.']
            ], 404);
        }

        $sale->products = SaleItems::getItems($sale->sales_id);

        return response()->json($sale);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        try{

            if(empty($id) and isset($request['sales_id']) and !empty($request['sales_id'])){
                $id = $request['sales_id'];
            }

            $sale = Helper::arrayToObject(GetSales::getData($id));

            if (!$sale){
                return response([
                    'message' => ['This order do not match our records.']
                ], 404);
            }

            $command = new CancelSaleCommand( $sale->sales_id );
            $commandBus = new CommandBus();
            $commandBus->handle($command);

            return response([
                'message' => ['Order#'.$id.' has been canceled.']
            ], 200);

        } catch (Exception $e) {
            if(config('app.debug')) {
                return response()->json(ApiError::errorMessage($e->getMessage(), 1011),  500);
            }
            return response()->json(ApiError::errorMessage('There was an error performing the update operation', 1011), 500);
        }
    }
}
