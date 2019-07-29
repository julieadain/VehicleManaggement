<?php

namespace App\Http\Controllers\Auth;

use App\organization;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        DB::beginTransaction();
        try {

            $org = new Organization();

            $org->org_name = $request['org_name'];
            $org->address = $request['address'];
            $org->trade_license_copy = $request['trade_license_copy'];

            $org->save();


            $user = new User();

            $user->name = $request['name'];
            $user->email = $request['email'];
            $user->phone = $request['phone'];
            $user->role = "1";
            $user->org_id = $org->id;;
            $user->password = Hash::make($request['password']);

            $user->save();

            DB::commit();

            $this->guard()->login($user);

            session(['success' => 'Registration successful.']);
            return redirect($this->redirectPath());

        } catch (\Exception $e) {
            DB::rollBack();
            session(['error' => $e->getMessage()]);
            return redirect()->back();
        }

        /*return $this->registered($request, $user)
            ?: redirect($this->redirectPath());*/
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
            'trade_license_copy' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:4', 'confirmed'],
            'phone' => ['required']
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
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
