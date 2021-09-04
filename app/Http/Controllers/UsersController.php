<?php

namespace App\Http\Controllers;

use App\Assistance_center;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('admin_work');
        return view('users.index',['users'=>User::All()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('admin_work');
        return view('users.create',['roles'=>Role::All()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $this->authorize('admin_work');
        $user= new User();
        $user->fill($request->validated());
        if($request->has('role_id')){
            $role_id= $request->validated()['role_id'];
            error_log('users controller@update');
            $user->role_id = $role_id;
            $user->password = 'temp';
            $user->save();
        }
        return response()->json(['redirect' => route('users.index')]);

    }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  \App\Models\User  $user
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show(User $user)
    // {
    //     $this->authorize('admin_work');
    //     return view('users.show',['user'=>$user]);
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $this->authorize('admin_work');
        return view('users.edit',['user'=>$user,'roles'=>Role::All()]);
        //return view('users.edit',['user'=>$user,'roles'=>Role::All(),'assistance_centers'=>Assistance_center::All()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
        $this->authorize('admin_work');
        $user->update($request->validated());
        if($request->has('role_id')){
            $role_id= $request->validated()['role_id'];
            error_log('users controller@update');
            $user->role_id = $role_id;
            $user->save();
        }
        return response()->json(['redirect' => route('users.index')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->authorize('admin_work');
        $user->delete();
        return response()->json(['redirect' => route('users.index')]);
    }
}
