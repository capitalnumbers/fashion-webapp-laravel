<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function view()
    {
        return view('accounts.view', ['user' => auth()->user()]);
    }


    public function edit()
    {
        return view('accounts.edit', [ 'user' => auth()->user()]);
    }

    public function update()
    {
        $this->validate(request(), [

            'name' => 'required',

            'email' => 'required|email|unique:users,email,'.auth()->id(),
        ]);

        auth()->user()->update([

            'name' => request('name'),

            'email' => request('email')
        ]);

        return back();
    }
}
