<?php

namespace App\Http\Controllers;

use App\Model\SellerModel;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    //hàm khởi tạo được chạy đầu tiên rồi mới đến các hàm khác, không cần biết vị trí hàm này xếp ở đâu
    public function __construct()
    {
        $this->middleware('auth:seller')->only('index');
    }

    //
    public function index(){
        return view('seller.dashboard');
    }

    public function create(){
        return view('seller.auth.register');
    }

    public function store(Request $request){
        $this->validate($request, array(
            'name'=>'required',
            'email'=>'required',
            'password'=>'required'
        ));

        $sellerModel = new SellerModel();
        $sellerModel->name = $request->name;
        $sellerModel->email = $request->email;
        $sellerModel->password = bcrypt($request->password);
        $sellerModel->save();

        return redirect()->route('seller.auth.login');

    }

}
