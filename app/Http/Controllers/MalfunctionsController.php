<?php

namespace App\Http\Controllers;

use App\Models\Malfunction;
use App\Models\Solution;
use App\Models\Product;
use App\Http\Requests\MalfunctionRequest;

class MalfunctionsController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($product_id)
    {
        $product=Product::find($product_id);
        $this->authorize('staff_work_product',$product);
        $returnHTML = view('malfunctions.create')->with('product', $product)->render();
        return response()->json(['html'=>$returnHTML]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\MalfunctionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MalfunctionRequest $request)
    {
        $product=Product::find($request->validated()['product_id']);
        $this->authorize('staff_work_product',$product);

        $malfunction = new Malfunction;
        $malfunction->fill($request->validated());
        $malfunction->save();
        $returnHTML = view('malfunctions.show')->with('malfunction', $malfunction)->render();
        return response()->json(['html'=>$returnHTML,'new_malfunction_id'=>$malfunction->id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Malfunction  $malfunction
     * @return \Illuminate\Http\Response
     */
    public function edit($malfunction_id)
    {
        $malfunction =Malfunction::find($malfunction_id);
        $this->authorize('staff_work_product',$malfunction->product);

        $returnHTML = view('malfunctions.edit')->with('malfunction', $malfunction)->render();
        return response()->json(['html'=>$returnHTML,'malfunction_id'=>$malfunction->id]);
    }

    /**
     * Update the specified resource in storage.
     *
     *  @param  App\Http\Requests\MalfunctionRequest  $request
     * @param  \App\Models\Malfunction  $malfunction
     * @return \Illuminate\Http\Response
     */
    public function update(MalfunctionRequest $request, $malfunction_id)
    {
        $malfunction= Malfunction::find($malfunction_id);
        $this->authorize('staff_work_product',$malfunction->product);

        $malfunction->fill($request->validated());
        $malfunction->save();
        $returnHTML = view('malfunctions.show')->with('malfunction', $malfunction)->render();
        return response()->json(['html'=>$returnHTML,'malfunction_id'=>$malfunction->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Malfunction  $malfunction
     * @return \Illuminate\Http\Response
     */
    public function destroy($malfunction_id)
    {
        $malfunction = Malfunction::find($malfunction_id);
        $this->authorize('staff_work_product',$malfunction->product);

        $malfunction->delete();
        return response()->json(['malfunction_id' => $malfunction->id]);
    }
}
