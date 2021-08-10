<?php

namespace App\Http\Controllers;

use PHPUnit\Util\Json as Json;
use DB;
use App\Models\Product;
use  App\Models\Malfunction;
use App\Http\Requests\ProductRequest;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use SebastianBergmann\Environment\Console;
use Validator;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('products.index',['products'=>Product::All()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create',['malfunctions'=>Malfunction::All()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = Str::random(10).$image->getClientOriginalName();
        } else {
            $imageName = NULL;
        }

        $validated = $request->validated();
        unset($validated['malfunctions']);
        $product = new Product;
        $product->fill($validated);
        $product->image = $imageName;
        $product->save();

        if($request->has('malfunctions')){
            $malfunctions= $request->validated()['malfunctions'];
            $product->malfunctions()->attach($malfunctions);
        }

        if (!is_null($imageName)) {
            $destinationPath = public_path() . '/images/products';
            $image->move($destinationPath, $imageName);
        };

        return response()->json(['redirect' => route('products.index')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show',['product'=>$product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit',['product'=>$product,'malfunctions'=>Malfunction::All()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = Str::random(10).$image->getClientOriginalName();
        } else {
            $imageName = $product->image;
        }

        $validated = $request->validated();
        unset($validated['malfunctions']);
        $newproduct= Product::find($product->id);
        $newproduct->update($validated);
        $newproduct->image = $imageName;
        $newproduct->save();

        if($request->has('malfunctions')){
            $malfunctions= $request->validated()['malfunctions'];
            $product->malfunctions()->detach();
            $product->malfunctions()->attach($malfunctions);
        }

        if ($imageName!= $product->image) {
            $destinationPath = public_path() . '/images/products';
            $image->move($destinationPath, $imageName);
        };
        return response()->json(['redirect' => route('products.show',['product' => $product])]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json(['redirect' => route('products.index')]);
    }
}
