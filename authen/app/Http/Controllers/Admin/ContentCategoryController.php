<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Model\Admin\ContentCategoryModel;
class ContentCategoryController extends Controller
{
    //
    public function index(){
        $items = DB::table('content_category')->paginate(10);
        /*
         * Đây là biến truyền từ controller xuống view
         */

        $data = array();
        $data['cats'] = $items;
        return view('admin.content.content.category.index', $data);
    }

    public function create(){
        $data = array();

        return view('admin.content.content.category.submit', $data);
    }

    public function edit($id){
        /*
             * Đây là biến truyền từ controller xuống view
             */

        $data = array();
        $items = ContentCategoryModel::find($id);
        $data['cats'] = $items;
        return view('admin.content.content.category.edit', $data);
    }

    public function delete($id){
        /*
                 * Đây là biến truyền từ controller xuống view
                 */

        $data = array();
        $items = ContentCategoryModel::find($id);
        $data['cats'] = $items;

        return view('admin.content.content.category.delete', $data);
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

        $items = new ContentCategoryModel();
        $items->name = $input['name'];
        $items->slug = $input['slug'];
        $items->images = $input['images'];
        $items->intro = $input['intro'];
        $items->desc = $input['desc'];
        $items->save();

        return redirect('/admin/content/category');
    }

    public function update(Request $request, $id){
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required',
            'images' => 'required',
            'intro' => 'required',
            'desc' => 'required',

        ]);
        $input = $request->all();

        $items = ContentCategoryModel::find($id);
        $items->name = $input['name'];
        $items->slug = $input['slug'];
        $items->images = $input['images'];
        $items->intro = $input['intro'];
        $items->desc = $input['desc'];
        $items->save();

        return redirect('/admin/content/category');
    }

    public function destroy($id){

        $items = ContentCategoryModel::find($id);

        $items->delete();

        return redirect('/admin/content/category');
    }
}
