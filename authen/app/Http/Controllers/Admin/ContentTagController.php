<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Model\Admin\ContentTagModel;

class ContentTagController extends Controller
{
    //
    public function index(){
        $items = DB::table('content_tags')->paginate(10);
        /*
         * Đây là biến truyền từ controller xuống view
         */

        $data = array();

        $data['tags'] = $items;
        return view('admin.content.content.tag.index', $data);
    }

    public function create(){
        $data = array();
        $items = ContentTagModel::all();
        $data['tags'] = $items;
        return view('admin.content.content.tag.submit', $data);
    }

    public function edit($id){
        /*
             * Đây là biến truyền từ controller xuống view
             */

        $data = array();
        $items = ContentTagModel::find($id);
        $data['tags'] = $items;

        return view('admin.content.content.tag.edit', $data);
    }

    public function delete($id){
        /*
                 * Đây là biến truyền từ controller xuống view
                 */

        $data = array();
        $items = ContentTagModel::find($id);
        $data['tags'] = $items;

        return view('admin.content.content.tag.delete', $data);
    }

    public function store(Request $request){

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required',
            'images' => 'required',
            'intro' => 'required',


        ]);

        $input = $request->all();

        $items = new ContentTagModel();
        $items->name = $input['name'];
        $items->slug = $input['slug'];
        $items->images = $input['images'];
        $items->intro = $input['intro'];
        $items->author_id = isset($input['author_id']) ? $input['author_id'] : 0;
        $items->view = isset($input['view']) ? $input['view'] : 0;
        $items->save();

        return redirect('/admin/content/tag');
    }

    public function update(Request $request, $id){

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required',
            'images' => 'required',
            'intro' => 'required',




        ]);

        $input = $request->all();

        $items = ContentTagModel::find($id);
        $items->name = $input['name'];
        $items->slug = $input['slug'];
        $items->images = $input['images'];
        $items->intro = $input['intro'];
        $items->author_id = isset($input['author_id']) ? $input['author_id'] : 0;
        $items->view = isset($input['view']) ? $input['view'] : 0;
        $items->save();

        return redirect('/admin/content/tag');
    }

    public function destroy($id){

        $items = ContentTagModel::find($id);

        $items->delete();

        return redirect('/admin/content/tag');
    }
}
