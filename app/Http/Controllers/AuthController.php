<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades;
use Hash;
use Auth;
use App\User;


class AuthController extends Controller
{
    public function index()
    {
        return view('login.login',);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
        ], [
            'username.required' => 'username is required',
            'password.required' => 'password is required',
        ]);

        if (Auth::attempt($validator->validate())) {
            return redirect()->route('book.show');

        }else if(empty(Auth::attempt($validator->validate()))) {

            $data['errors'] = 'Username or Password Incorrect';
            return redirect()->back()->withErrors($data);

        }
        return redirect()->back()->withErrors($validator->errors());
    }


    public function logout(Request $request)
    {
        if (Auth::check()) {
            Auth::logout();
            $request->session()->invalidate();
        }
        return redirect()->route('login');
    }

    public function toRegisterForm()
    {
        return view('login.register',);
    }


    public function register (Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required|min:6|max:20',
            'fullname' => 'required'
        ], [
            'name.required' => 'name is required',
            'username.required' => 'username is required',
            'password.required' => 'password is required',
            'name.max' => 'name max charactor 100',
            'password.max' => 'password max charactor 20',
            'password.min' => 'password min charactor 6',

        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

       User::create([
           'fullname' => $request->fullname,
           'username' => $request->username,
           'password'=> Hash::make($request->password)
       ]);

       return redirect()->route('login.home');


    }
}
