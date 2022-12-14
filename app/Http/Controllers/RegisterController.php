<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    public function index(){
        return view('login.register', [
            'title' => 'Register',
            'active' => 'register'
        ]);
    }

    public function store(Request $request){
        
        $validatedData = $request->validate([
            'name' => 'required|min:10|max:255',
            'username' => ['required','min:5','max:255','unique:users'],
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255'
        ]);

        // $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        // $request->session()->flash('success','Registration successfully! , Please Login');

        return redirect('/login')->with('success','Registration successfully! , Please Login');
    }
}
