<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Model\Admin\MenuModel;
class MenuController extends Controller
{
    //
    public function index(){
        $items = DB::table('menus')->paginate(10);
        /*
         * Đây là biến truyền từ controller xuống view
         */

        $data = array();

        $data['menus'] = $items;
        return view('admin.content.menu.index', $data);
    }

    public function create(){
        $data = array();
        $items = MenuModel::all();
        $data['menus'] = $items;
        return view('admin.content.menu.submit', $data);
    }

    public function edit($id){
        /*
             * Đây là biến truyền từ controller xuống view
             */

        $data = array();
        $items = MenuModel::find($id);
        $data['menus'] = $items;

        return view('admin.content.menu.edit', $data);
    }

    public function delete($id){
        /*
                 * Đây là biến truyền từ controller xuống view
                 */

        $data = array();
        $items = MenuModel::find($id);
        $data['menus'] = $items;

        return view('admin.content.menu.delete', $data);
    }

    public function store(Request $request){

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required',
            'desc' => 'required',


        ]);

        $input = $request->all();

        $items = new MenuModel();
        $items->name = $input['name'];
        $items->slug = $input['slug'];
        $items->desc = $input['desc'];
        $items->location = $input['location'];
        $items->save();

        return redirect('/admin/menu');
    }

    public function update(Request $request, $id){

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required',
            'desc' => 'required',





        ]);

        $input = $request->all();

        $items = MenuModel::find($id);
        $items->name = $input['name'];
        $items->slug = $input['slug'];
        $items->desc = $input['desc'];
        $items->location = $input['location'];

        $items->save();

        return redirect('/admin/menu');
    }

    public function destroy($id){

        $items = MenuModel::find($id);

        $items->delete();

        return redirect('/admin/menu');
    }
}
