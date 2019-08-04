<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\BookStore; //ทำให้เราเรียกเพื่อมาทำอะไรเกี่ยวกับ DB ได้
use Validator;
use Illuminate\Support\Facades;
use Illuminate\Support\Facades\Hash;
use Auth;


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

    public function Register (Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name ' => 'required',
            'username' => 'required',
            'password' => 'required',
        ], [
            'name.required' => 'name is required',
            'username.required' => 'username is required',
            'password.required' => 'password is required',
        ]);
        
        //if(Auth::)

    }
}
