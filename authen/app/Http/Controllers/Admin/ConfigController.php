<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\ConfigModel;
class ConfigController extends Controller
{
    //
    public function index(){
        $items = ConfigModel::all();
        /*
         * Đây là biến truyền từ controller xuống view
         */

        $data = array();

        $data['configs'] = $items;
        return view('admin.content.config.index', $data);
    }
    public function store(Request $request){

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required',
            'images' => 'required',
            'intro' => 'required',
            'desc' => 'required',


        ]);

        $input = $request->all();

        $items = new ContentPageModel();
        $items->name = $input['name'];
        $items->slug = $input['slug'];
        $items->images = $input['images'];
        $items->intro = $input['intro'];
        $items->desc = $input['desc'];
        $items->author_id = isset($input['author_id']) ? $input['author_id'] : 0;
        $items->view = isset($input['view']) ? $input['view'] : 0;
        $items->save();

        return redirect('/admin/content/page');
    }

}
