<?php

namespace App\Http\Controllers;

use App\Manager;
use App\Rules\ValidMobile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('role', '3')->get();
//        dd($user);
        return view("manager.view", compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:4', 'confirmed'],
            'phone' => ['required', new ValidMobile()]
        ]);

        $user = new User();

        $user->name = request('name');
        $user->email = request('email');
        $user->password = request('password');
        $user->phone = request('phone');
        $user->role = '3';
        $user->status = 'manager';
        $user->org_id = Auth::user()->org_id;
        $user->save();

        return redirect('/manager');


    }

    /**
     * Display the specified resource.
     * @param \App\Manager $manager
     */
    public function show(Manager $manager)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @param \App\Manager $manager
     */
    public function edit(Manager $manager)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Manager $manager
     */
    public function update(Request $request, Manager $manager)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Manager $manager
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, $id)
    {
        User::find($id)->delete();
        return redirect()->back();
    }
}
