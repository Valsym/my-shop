<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // с пагинацией
        return ProductResource::collection(
            Product::with(['images', 'comments'])->paginate(3));
        //$products = Product::with(['images', 'comments'])->get();
//        $products = ProductResource::collection(
//            Product::with('images', 'comments')->get());
//
//        return response()->json($products);
    }

    public function showByCode($code)
    {
        $product = Product::with(['images', 'comments'])
            ->where('code', $code)->firstOrFail();

        return new ProductResource($product);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
//        $product = Product::with(['images', 'comments'])->findOrFail($id);
//        return response()->json($product);
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
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
