<?php

namespace App\Http\Controllers\LojaABC;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\LojaABC\Products;
use Illuminate\Http\Request;
use App\Queries\GetProducts;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $products = Helper::arrayToObject(GetProducts::getData());

        // format expected
        foreach ($products as $product){
            $product->price = number_format($product->price, 0, ',', '.');
        }

        return response()->json($products);
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
        //
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
