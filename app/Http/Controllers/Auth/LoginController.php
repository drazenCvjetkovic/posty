<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller {
    //
public function __construct() {

    $this->middleware(['guest']);
}

    public function index() {
        return view('auth.login');
    }

    public function store(Request $request) {

        $this->validate($request, [
            'email'    => 'required|email',
            'password' => 'required',

        ]);

        //pass remember as 2. argument to auth->attempt
        if(!auth()->attempt($request->only('email','password'),$request->remember)){
            return back()->with('status','Invalid email or password');
        }

        return redirect()->route('dashboard');
    }
}
