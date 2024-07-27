<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\DanhMuc;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    use RegistersUsers {
        // Overriding the trait's register method
        register as registration;
    }
    public function showRegistrationForm()
    {
        $danh_mucs = DanhMuc::query()->get(); 

        return view('auth.register',compact('danh_mucs'));
    }

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        // Create the user
        $user = $this->create($request->all());

        // Redirect to login page
        return redirect('/login')->with('status', 'Registration successful. Please login.');
    }
}
