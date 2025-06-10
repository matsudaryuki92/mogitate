<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\UseCases\ProductRegister;
use App\UseCases\ProductUpdate;
use App\UseCases\ProductSearch;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ProductSearch $useCase)
    {
        $products = $useCase->search(request());

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request, ProductRegister $useCase)
    {
        $useCase->register($request);

        return redirect()->route('products.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $seasons = \App\Models\Season::all();
        $product->load('seasons');
        return view('products.detail', compact('product', 'seasons'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product, ProductUpdate $useCase)
    {
        $useCase->update($request, $product);

        return redirect()->route('products.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index');
    }

}
