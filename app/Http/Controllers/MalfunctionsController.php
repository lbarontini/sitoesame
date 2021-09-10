<?php

namespace App\Http\Controllers;

use App\Models\Malfunction;
use App\Models\Solution;
use App\Models\Product;
use App\Http\Requests\MalfunctionRequest;
use SebastianBergmann\Environment\Console;

class MalfunctionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('staff_work');
        return view('malfunctions.index',['malfunctions'=>Malfunction::All()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Product $product)
    {
        $this->authorize('staff_work');

        return view('malfunctions.create',['product'=>$product]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\MalfunctionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MalfunctionRequest $request)
    {
        $this->authorize('staff_work');
        $malfunction = new Malfunction;
        $malfunction->fill($request->validated());
        $malfunction->save();

        return response()->json(['redirect' => route('products.show',['product'=>$malfunction->product])]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Malfunction  $malfunction
     * @return \Illuminate\Http\Response
     */
    // public function show(Malfunction $malfunction)
    // {
    //     return view('malfunctions.show',['malfunction'=>$malfunction]);
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Malfunction  $malfunction
     * @return \Illuminate\Http\Response
     */
    public function edit($malfunction_id)
    {
        $this->authorize('staff_work');
        $malfunction =Malfunction::find($malfunction_id);
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
        $this->authorize('staff_work');
        $malfunction= Malfunction::find($malfunction_id);
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
        $this->authorize('staff_work');
        $malfunction = Malfunction::find($malfunction_id);
        $malfunction->delete();
        return response()->json(['malfunction_id' => $malfunction->id]);
    }
}
