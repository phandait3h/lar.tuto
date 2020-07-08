<?php

namespace App\Http\Controllers;

use App\Model\ShipperModel;
use Illuminate\Http\Request;

class ShipperController extends Controller
{
    //
    //hàm khởi tạo được chạy đầu tiên rồi mới đến các hàm khác, không cần biết vị trí hàm này xếp ở đâu
    public function __construct()
    {
        $this->middleware('auth:shipper')->only('index');
    }

    //
    public function index(){
        return view('shipper.dashboard');
    }

    public function create(){
        return view('shipper.auth.register');
    }

    public function store(Request $request){
        $this->validate($request, array(
            'name'=>'required',
            'email'=>'required',
            'password'=>'required'
        ));

        $shipperModel = new ShipperModel();
        $shipperModel->name = $request->name;
        $shipperModel->email = $request->email;
        $shipperModel->password = bcrypt($request->password);
        $shipperModel->save();

        return redirect()->route('shipper.auth.login');

    }

}
