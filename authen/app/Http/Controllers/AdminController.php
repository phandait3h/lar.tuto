<?php

namespace App\Http\Controllers;

use App\Model\AdminModel;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //hàm khởi tạo được chạy đầu tiên rồi mới đến các hàm khác, không cần biết vị trí hàm này xếp ở đâu
    public function __construct()
    {
        $this->middleware('auth:admin')->only('index');
    }

    //
    public function index(){
        return view('admin.dashboard');
    }

    public function create(){
        return view('admin.auth.register');
    }

    public function store(Request $request){
        $this->validate($request, array(
            'name'=>'required',
            'email'=>'required',
            'password'=>'required'
        ));

        $adminModel = new AdminModel();
        $adminModel->name = $request->name;
        $adminModel->email = $request->email;
        $adminModel->password = bcrypt($request->password);
        $adminModel->save();

        return redirect()->route('admin.auth.login');

    }


}
