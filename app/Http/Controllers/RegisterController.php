<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class RegisterController extends Controller
{
    public function index()
    {
        return view('Register.register-app', [
            'title'=> 'Register',
            'active'=> 'register'
        ]);
    }


public function store(request$request)
{
    $validatedData=$request->validate([

        'email'=>'required|email:dns|unique:users',
        'name'=>'required|max:255',
        'password'=>'required|min:5|max:255'     
    ]);
    $validatedData['password'] = Hash::make($validatedData['password']);
    User::create($validatedData);
    
    $request->session()->flash('success', 'Registration succesfull !! Please login');

    return redirect ('login');
}

}