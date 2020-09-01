<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\MenuModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Model\Admin\MenuItemModel;
class MenuItemController extends Controller
{
    //
    public function index(){
        $items = DB::table('menu_items')->paginate(10);
        /*
         * Đây là biến truyền từ controller xuống view
         */

        $data = array();

        $data['menu_items'] = $items;
        return view('admin.content.menuitem.index', $data);
    }

    public function create(){
        $data = array();
        $data['types'] = MenuItemModel::getTypeOfMenuItem();
        $data['menu_items'] = MenuModel::all();
        return view('admin.content.menuitem.submit', $data);
    }

    public function edit($id){
        /*
             * Đây là biến truyền từ controller xuống view
             */

        $data = array();
        $items = MenuItemModel::find($id);
        $data['menu_items'] = $items;

        return view('admin.content.menuitem.edit', $data);
    }

    public function delete($id){
        /*
                 * Đây là biến truyền từ controller xuống view
                 */

        $data = array();
        $items = MenuItemModel::find($id);
        $data['menu_items'] = $items;

        return view('admin.content.menuitem.delete', $data);
    }

    public function store(Request $request){

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'type' => 'required',
            'desc' => 'required',


        ]);

        $input = $request->all();

        $items = new MenuItemModel();
        $items->name = isset($input['name']) ? $input['name'] : '';
        $items->name = isset($input['menu_id']) ? $input['menu_id'] : '';
        $items->type = isset($input['type']) ? $input['type'] : '';
        $items->parrams = isset($input['parrams']) ? $input['parrams'] : '';
        $items->link = isset($input['link']) ? $input['link'] : '';
        $items->icon = isset($input['icon']) ? $input['icon'] : '';
        $items->desc = isset($input['desc']) ? $input['desc'] : '';
        $items->parent_id = isset($input['parent_id']) ? $input['parent_id'] : '';

        $items->save();

        return redirect('/admin/menuitems');
    }

    public function update(Request $request, $id){

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'type' => 'required',
            'desc' => 'required',

        ]);

        $input = $request->all();

        $items = MenuItemModel::find($id);
        $items->name = isset($input['name']) ? $input['name'] : '';
        $items->name = isset($input['menu_id']) ? $input['menu_id'] : '';
        $items->type = isset($input['type']) ? $input['type'] : '';
        $items->parrams = isset($input['parrams']) ? $input['parrams'] : '';
        $items->link = isset($input['link']) ? $input['link'] : '';
        $items->icon = isset($input['icon']) ? $input['icon'] : '';
        $items->desc = isset($input['desc']) ? $input['desc'] : '';
        $items->parent_id = isset($input['parent_id']) ? $input['parent_id'] : '';
        $items->save();

        return redirect('/admin/menuitems');
    }

    public function destroy($id){

        $items = MenuItemModel::find($id);

        $items->delete();

        return redirect('/admin/menuitems');
    }
}
