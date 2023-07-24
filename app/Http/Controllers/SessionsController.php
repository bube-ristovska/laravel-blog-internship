<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function store(){
        //attempt and to auth the user and validate the request
        $attributes = request()->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if(auth()->attempt($attributes)){
            session()->regenerate(); //da ne mozhe da ima session attack so session fixation
            return redirect('/');
        }

        return back()
            ->withInput()
            ->withErrors(['email'=> 'Your provided credentials are not real']);
    }
    public function create(){
        return view('sessions.create');
    }
    public function destroy(){
        auth()->logout();
        return redirect('/');
    }
}
