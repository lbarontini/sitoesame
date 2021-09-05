<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssistanceCenterRequest;
use App\Models\AssistanceCenter;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class AssistanceCentersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('assistance_centers.index',['assistance_centers'=>AssistanceCenter::All()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('admin_work');
        return view('assistance_centers.create',
                    ['technicians'=>User::whereHas('role', function (Builder $query) {
                        $query->where('name', 'tecn')->where('assistance_center_id',null);
                        })->get()
                    ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AssistanceCenterRequest $request)
    {
        $this->authorize('admin_work');

        $assistance_center = new AssistanceCenter();
        $assistance_center->fill($request->validated());
        $assistance_center->save();
        if($request->has('technicians')){
            foreach ($request->validated()['technicians'] as $technician_id) {
                $technician= User::find($technician_id);
                $technician->assistanceCenter()->dissociate();
                $technician->assistanceCenter()->associate($assistance_center);
                $technician->save();
            }
        }

        return response()->json(['redirect' => route('assistance_centers.index')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AssistanceCenter  $assistance_center
     * @return \Illuminate\Http\Response
     */
    public function show(AssistanceCenter $assistance_center)
    {
        return view('assistance_centers.show',['assistance_center'=>$assistance_center]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AssistanceCenter  $assistanceCenter
     * @return \Illuminate\Http\Response
     */
    public function edit(AssistanceCenter $assistance_center)
    {
        $this->authorize('admin_work');
        return view('assistance_centers.edit',
            ['assistance_center'=>$assistance_center,
             'technicians'=>User::whereHas('role', function (Builder $query) {
                $query->where('name', 'tecn');
                })->get()
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AssistanceCenter  $assistanceCenter
     * @return \Illuminate\Http\Response
     */
    public function update(AssistanceCenterRequest $request, AssistanceCenter $assistance_center)
    {
        $this->authorize('admin_work');

        $assistance_center->update($request->validated());
        $assistance_center->save();
        if($request->has('technicians')){
            foreach ($request->validated()['technicians'] as $technician_id) {
                $technician= User::find($technician_id);
                $technician->assistanceCenter()->dissociate();
                $technician->assistanceCenter()->associate($assistance_center);
                $technician->save();
            }
        }

        return response()->json(['redirect' => route('assistance_centers.show',['assistance_center' => $assistance_center])]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AssistanceCenter  $assistanceCenter
     * @return \Illuminate\Http\Response
     */
    public function destroy(AssistanceCenter $assistance_center)
    {
        $this->authorize('admin_work');

        $assistance_center->delete();
        return response()->json(['redirect' => route('assistance_centers.index')]);
    }
}
