<?php

namespace App\Http\Controllers\LojaABC;

use App\Helpers\SalesHelper;
use App\Http\Controllers\Controller;
use App\Models\LojaABC\SaleItems;
use App\Models\LojaABC\Sales;
use Illuminate\Http\Request;

class SaleItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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

                SaleItems::putItems($sale->sales_id, $sale->products);

                $total = Sales::calTotal($sale->sales_id);
                if($total <= 0){
                    return response([
                        'message' => ['Error! The amount is expected greater zero.'],
                        'sales' => $request->all()
                    ], 400);
                }
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
        //
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
    public function destroy(string $id)
    {
        //
    }
}