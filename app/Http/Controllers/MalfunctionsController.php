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
        $returnHTML = view('malfunctions.edit')->with('malfunction_id', $malfunction_id)->render();
        return response()->json(['html'=>$returnHTML]);
    }

    /**
     * Update the specified resource in storage.
     *
     *  @param  App\Http\Requests\MalfunctionRequest  $request
     * @param  \App\Models\Malfunction  $malfunction
     * @return \Illuminate\Http\Response
     */
    public function update(MalfunctionRequest $request, Malfunction $malfunction)
    {
        $this->authorize('staff_work');

        $malfunction->fill($request->validated());
        $malfunction->save();
        return response()->json(['redirect' => route('products.show',['product'=>$malfunction->product])]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Malfunction  $malfunction
     * @return \Illuminate\Http\Response
     */
    public function destroy($malfunction)
    {
        error_log($malfunction);
        $this->authorize('staff_work');
        $malfunctiontodel = Malfunction::where('id', $malfunction)->first();
        //$malfunctiontodel->delete();
        return response()->json(['redirect' => route('malfunctions.index')]);
    }

        /**
     * Remove the specified resource found by the resource id from storage
     *
     * @param  \App\Models\Malfunction  $malfunction
     * @return \Illuminate\Http\Response
     */
    public function destroyById($malfunction_id)
    {
        error_log($malfunction_id);
        $this->authorize('staff_work');
        $malfunctiontodel = Malfunction::where('id', $malfunction_id)->first();
        $malfunctiontodel->delete();
        return response()->json(['redirect' => route('malfunctions.index')]);
    }
}
