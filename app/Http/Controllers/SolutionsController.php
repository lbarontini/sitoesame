<?php

namespace App\Http\Controllers;

use App\Models\Malfunction;
use App\Models\Solution;
use App\Http\Requests\SolutionRequest;
use App\Models\Product;

class SolutionsController extends Controller
{
    // /**
    //  * Display a listing of the resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function index()
    // {
    //     $this->authorize('staff_work');
    //     return view('solutions.index',['solutions'=>Solution::All()]);
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Malfunction $malfunction)
    {
        $this->authorize('staff_work');

        return view('solutions.create',['malfunction'=>$malfunction]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\SolutionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SolutionRequest $request)
    {
        $this->authorize('staff_work');

        $solution = new Solution;
        $solution->fill($request->validated());
        $solution->save();

        return response()->json(['redirect' => route('products.show',['product'=>$solution->malfunction->product])]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Solution  $solution
     * @return \Illuminate\Http\Response
     */
    // public function show(Solution $solution)
    // {
    //     $this->authorize('tecn_work');
    //     return view('solutions.show',['solution'=>$solution]);
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Solution  $solution
     * @return \Illuminate\Http\Response
     */
    public function edit($solution_id)
    {
        $this->authorize('staff_work');

        $solution =Solution::find($solution_id);
        $returnHTML = view('solutions.edit')->with('solution', $solution)->render();
        return response()->json(['html'=>$returnHTML,'solution_id'=>$solution->id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\SolutionRequest  $request
     * @param  \App\Models\Solution  $solution
     * @return \Illuminate\Http\Response
     */
    public function update(SolutionRequest $request, $solution_id)
    {
        $this->authorize('staff_work');

        $solution= Solution::find($solution_id);
        $solution->fill($request->validated());
        $solution->save();
        $returnHTML = view('solutions.show')->with('solution', $solution)->render();
        return response()->json(['html'=>$returnHTML,'solution_id'=>$solution->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Solution  $solution
     * @return \Illuminate\Http\Response
     */
    public function destroy($solution_id)
    {
        $this->authorize('staff_work');

        $solution= Solution::find($solution_id);
        $solution->delete();
        return response()->json(['solution_id'=>$solution->id]);
    }
}
