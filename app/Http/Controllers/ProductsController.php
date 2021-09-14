<?php

namespace App\Http\Controllers;

use PHPUnit\Util\Json as Json;
use App\Models\Product;
use  App\Models\Malfunction;
use App\Http\Requests\ProductRequest;
use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;
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
     * return an ajax response for displayng the searched resources.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $value = str_replace("*", "%", $request->get('search'));

        if ($value==''){
            $products = Product::All();
        }else {
            $products = Product::where('description','like', $value)->get();
        }
        $returnHTML = view('products.list')->with('products', $products)->render();
        return response()->json(['html'=>$returnHTML]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('admin_work');
        $staff_members= User::whereHas('role', function (Builder $query) {
            $query->where('name', 'staff')->orWhere('name', 'admin');
        })->get();
        return view('products.create',['malfunctions'=>Malfunction::All(),'staff_members'=>$staff_members]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $this->authorize('admin_work');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = Str::random(10).$image->getClientOriginalName();
        } else {
            $imageName = NULL;
        }

        $product = new Product;
        $product->fill($request->validated());
        $product->image = $imageName;
        $product->save();

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
        $this->authorize('staff_work');
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
        $this->authorize('staff_work');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
        } else {
            $imageName = $product->image;
        }
        $product->update($request->validated());
        $product->image = $imageName;
        $product->save();


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
        $this->authorize('admin_work');
        $product->delete();
        return response()->json(['redirect' => route('products.index')]);
    }
}
