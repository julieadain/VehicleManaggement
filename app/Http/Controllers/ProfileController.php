<?php

namespace App\Http\Controllers;

use App\Organization;
use App\Rules\ValidMobile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $organization = Organization::find(Auth::user()->org_id);
        return view("profile.view", compact('organization'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function changeLogo()
    {
        $organization = Organization::find(Auth::user()->org_id);
        return view("profile.change_logo", compact('organization'));
    }

    public function storeLogo(Request $request)
    {
        $this->validate($request, [
            'logo' => 'required',
            'password' => 'required'
        ]);

        $origin = User::find(Auth::user()->id);

        if (Hash::check($request['password'], $origin->password)) {

            $filename = time() . rand() . rand() . '.' . $request->file('logo')->getClientOriginalExtension();
            $request->file('logo')->move(public_path('/upload'), $filename);

            $organization = Organization::find(Auth::user()->org_id);
            $organization->logo = $filename;
            $organization->save();
//            dd($organization->logo);
        } else {
            Session::flash('error', 'Given Password did not match !');
            return redirect()->back();
        }
        return redirect('profile');
    }

    public function changeEmail()
    {
        return view("profile.change_email");
    }

    public function changePhone()
    {
        return view("profile.change_phone");

    }

    public function storePhone(Request $request)
    {
        $this->validate($request, [
            'phone' => ['required', new ValidMobile()],
            'newPhone' => ['required', new ValidMobile()],
            'password' => 'required'
        ]);
//    dd('aisuhfiua');
        $user = User::find(Auth::user()->id);

        if (Hash::check($request['password'], $user->password)) {

            if ($request['phone'] == $user->phone) {
                $user->phone = $request['newPhone'];
                $user->save();
            } else {
                Session::flash('errorPhone', 'Present phone number did not match !');
                return redirect()->back()->with('request', $request);
            }
//            dd($user->phone);

        } else {
            Session::flash('errorPass', 'Given Password did not match !');
            return redirect()->back();
        }
        return redirect('profile');
    }

    public function changeAddress()
    {
        return view("profile.change_address");
    }

    public function changePassword()
    {
        return view("profile.change_password");

    }

    public function destroy($id)
    {
        //
    }
}
