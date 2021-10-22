<?php

namespace App\Http\Controllers;

use App\Models\AssistanceCenter;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
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
        return view('users.create',['roles'=>Role::All(),'assistance_centers'=>AssistanceCenter::All()]);
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
        $user->password = Hash::make($request->validated()['password']);
        $user->role()->associate(Role::where('name', 'guest')->first());
        $user->save();
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
        return view('users.edit',['user'=>$user,'roles'=>Role::All(),'assistance_centers'=>AssistanceCenter::All()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->authorize('admin_work');
        //using custom request for ignoring email update
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id),],
            'password' =>['nullable','string', 'min:8'],
            'role_id'=> ['nullable']
        ]);
        $data['password']=Hash::make($data['password']);
        $user->update($data);
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
