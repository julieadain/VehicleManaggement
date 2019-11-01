<?php

namespace App\Http\Controllers\Auth;

use App\organization;
use App\Rules\ValidMobile;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Mockery\Exception;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'org_name' => 'required|unique:organizations|string|max:255',
            'address' => ['required', 'string', 'max:255'],
            'trade_license_copy' => 'required',
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:4', 'confirmed'],
            'phone' => ['required', new ValidMobile()]
        ]);

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $filename = time() . rand() . rand() . '.' . $data['trade_license_copy']->getClientOriginalExtension();
        $data['trade_license_copy']->move(public_path('/upload'), $filename);

        DB::beginTransaction();
        try {
            $data['trade_license_copy'] = $filename;
            $organization = Organization::create($data);
            $data['org_id'] = $organization->id;
            $data['password'] = Hash::make($data['password']);

            $user = User::create($data);
            DB::commit();
            return $user;
        }catch (Exception $exception){
            DB::rollBack();
            echo $exception->getMessage();
        }
    }
}
