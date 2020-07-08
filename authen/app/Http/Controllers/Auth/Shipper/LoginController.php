<?php

namespace App\Http\Controllers\Auth\Shipper;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    use AuthenticatesUsers;
    //
    public function __construct()
    {
        $this->middleware('guest:shipper')->except('logout');
    }
    public function login(){
        return view('shipper.auth.login');
    }

    public function loginShipper(Request $request){
        $this->validate($request, array(
            'email'=>'required|email',
            'password'=>'required|min:6'
        ));

        //dang nhap
        if (Auth::guard('shipper')->attempt(['email'=>$request->email, 'password'=>$request->password],$request->remember))
        {
            //neu dang nhap thanh cong
            return redirect()->intended(route('shipper.dashboard'));
        }
        //neu dang nhap that bai thi quay lai view dang nhap voi email va remember
        return redirect()->back()->withInput($request->only('email','remember'));
    }

    public function logout(){
        Auth::guard('shipper')->logout();

        return redirect()->route('shipper.auth.login');
    }

}
