<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Resources\Product\ProductCollection;
use App\Http\Resources\Product\ProductResource;
use App\Model\Product;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api')->except('index', 'show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
//        return Product::all();
        return ProductCollection::collection(Product::paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $product = new Product();

        $product->name = $request->name;
        $product->details = $request->description;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->stock = $request->stock;

        $product->save();

        return response(["data" => new ProductResource($product)], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
//        $data = [
//            'name' => $this->name,
//            'description' => $this->details,
//            'stock' => $this->stock,
//            'price' => $this->price,
//            'discount' => $this->discount
//        ];
//
//        return $data;

        return new ProductResource($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Model\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
        $product->details = $request->description;
        unset($request['description']);
        $product->update($request->all());

        return response(["data" => new ProductResource($product)], Response::HTTP_CREATED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
        $product->delete();
        return response('Product Deleted', Response::HTTP_CREATED);
    }
}
