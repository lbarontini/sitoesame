<?php

namespace App\Http\Controllers;

use App\Models\Malfunction;
use App\Models\Solution;
use App\Http\Requests\SolutionRequest;

class SolutionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('solutions.index',['solutions'=>Solution::All()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('solutions.create',['malfunctions'=>Malfunction::All()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\SolutionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SolutionRequest $request)
    {
        $validated = $request->validated();
        unset($validated['malfunctions']);
        $solution = new Solution;
        $solution->fill($validated);
        $solution->save();

        if($request->has('malfunctions')){
            $malfunctions= $request->validated()['malfunctions'];
            $solution->malfunctions()->attach($malfunctions);
        }

        return response()->json(['redirect' => route('solutions.index')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Solution  $solution
     * @return \Illuminate\Http\Response
     */
    public function show(Solution $solution)
    {
        return view('solutions.show',['solution'=>$solution]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Solution  $solution
     * @return \Illuminate\Http\Response
     */
    public function edit(Solution $solution)
    {
        return view('solutions.edit',['solution'=>$solution,'malfunctions'=>Malfunction::All()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\SolutionRequest  $request
     * @param  \App\Models\Solution  $solution
     * @return \Illuminate\Http\Response
     */
    public function update(SolutionRequest $request, Solution $solution)
    {
        $validated = $request->validated();
        unset($validated['malfunctions']);
        $newsolution= Malfunction::find($solution->id);
        $newsolution->fill($validated);
        $newsolution->save();

        if($request->has('malfunctions')){
            $malfunctions= $request->validated()['malfunctions'];
            $solution->malfunctions()->detach();
            $solution->malfunctions()->attach($malfunctions);
        }

        return response()->json(['redirect' => route('solutions.index')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Solution  $solution
     * @return \Illuminate\Http\Response
     */
    public function destroy(Solution $solution)
    {
        $solution->delete();
        return response()->json(['redirect' => route('solutions.index')]);
    }
}
