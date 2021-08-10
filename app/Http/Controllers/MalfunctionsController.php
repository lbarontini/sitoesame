<?php

namespace App\Http\Controllers;

use App\Models\Malfunction;
use App\Models\Solution;
use Illuminate\Http\Request;
use App\Http\Requests\MalfunctionRequest;

class MalfunctionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('malfunctions.index',['malfunctions'=>Malfunction::All()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('malfunctions.create',['solutions'=>Solution::All()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\MalfunctionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MalfunctionRequest $request)
    {
        $validated = $request->validated();
        unset($validated['solutions']);
        $malfunction = new Malfunction;
        $malfunction->fill($validated);
        $malfunction->save();

        if($request->has('solutions')){
            $solutions= $request->validated()['solutions'];
            $malfunction->solutions()->attach($solutions);
        }

        return response()->json(['redirect' => route('malfunctions.index')]);
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
    public function edit(Malfunction $malfunction)
    {
        return view('malfunctions.edit',['malfunction'=>$malfunction,'solutions'=>Solution::All()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  @param  App\Http\Requests\MalfunctionRequest  $request
     * @param  \App\Models\Malfunction  $malfunction
     * @return \Illuminate\Http\Response
     */
    public function update(MalfunctionRequest $request, Malfunction $malfunction)
    {
        $validated = $request->validated();
        unset($validated['solutions']);
        $newmalfunction= Malfunction::find($malfunction->id);
        $newmalfunction->fill($validated);
        $newmalfunction->save();

        if($request->has('solutions')){
            $solutions= $request->validated()['solutions'];
            $malfunction->solutions()->detach();
            $malfunction->solutions()->attach($solutions);
        }

        return response()->json(['redirect' => route('malfunctions.index')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Malfunction  $malfunction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Malfunction $malfunction)
    {
        $malfunction->delete();
        return response()->json(['redirect' => route('malfunctions.index')]);
    }
}
