<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\hash;
use Illuminate\Support\Facades\session;
use App\Models\Tutor;



class AuthController extends Controller
{
    public function index(){
        return view('landing_page');
    }

    public function login(){
        return view ('login_page');
    }
    public function register(){
        return view('register_page');

    }public function landpage(){
        return view('landing_page');
    }

    public function postRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'state' => 'required',
            'password' => 'required',
        ]);

        $data = $request->all();
        $check = $this->create($data);
        $check->save();

        return redirect("landing_page")->with('save', 'Success')->withErrors('error', 'Failed');;
    }

    public function create(array $data)
    {
        return Tutor::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'address' =>$data['address'],
            'state' => $data['state'],
            'password' => Hash::make($data['password'])
        ]);
    }


    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('main_page')->with('save', 'Success')->withErrors('error', 'Failed');
        }

        return redirect("login_page")->withSuccess('Oppes! You have entered invalid credentials');
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return Redirect('landing_page');
    }

    
    
    //
}
