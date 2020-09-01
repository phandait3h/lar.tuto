<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\ContentCategoryModel;
use App\Model\Admin\ContentPostModel;
use Illuminate\Support\Facades\DB;

class ContentPostController extends Controller
{
    //
    public function index(){
        $items = DB::table('content_posts')->paginate(10);
        /*
         * Đây là biến truyền từ controller xuống view
         */

        $data = array();

        $data['posts'] = $items;
        return view('admin.content.content.post.index', $data);
    }

    public function create(){
        $data = array();
        $cats = ContentPostModel::all();
        $data['cats'] = $cats;

        return view('admin.content.content.post.submit', $data);
    }

    public function edit($id){
        /*
             * Đây là biến truyền từ controller xuống view
             */

        $data = array();
        $items = ContentPostModel::find($id);
        $data['posts'] = $items;
        $cats = ContentCategoryModel::all();
        $data['cats'] = $cats;
        return view('admin.content.content.post.edit', $data);
    }

    public function delete($id){
        /*
                 * Đây là biến truyền từ controller xuống view
                 */

        $data = array();
        $items = ContentPostModel::find($id);
        $data['posts'] = $items;

        return view('admin.content.content.post.delete', $data);
    }

    public function store(Request $request){

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required',
            'images' => 'required',
            'intro' => 'required',
            'desc' => 'required',
            'author_id' => 'required',
            'view' => 'required',

        ]);

        $input = $request->all();

        $items = new ContentPostModel();
        $items->name = $input['name'];
        $items->slug = $input['slug'];
        $items->images = $input['images'];
        $items->intro = $input['intro'];
        $items->desc = $input['desc'];
        $items->author_id = isset($input['author_id']) ? $input['author_id'] : 0;
        $items->view = isset($input['view']) ? $input['view'] : 0;
        $items->cat_id = $input['cat_id'];
        $items->save();

        return redirect('/admin/content/post');
    }

    public function update(Request $request, $id){

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required',
            'images' => 'required',
            'intro' => 'required',
            'desc' => 'required',
            'author_id' => 'required',
            'view' => 'required',


        ]);

        $input = $request->all();

        $items = ContentPostModel::find($id);
        $items->name = $input['name'];
        $items->slug = $input['slug'];
        $items->images = $input['images'];
        $items->intro = $input['intro'];
        $items->desc = $input['desc'];
        $items->author_id = isset($input['author_id']) ? $input['author_id'] : 0;
        $items->view = isset($input['view']) ? $input['view'] : 0;
        $items->cat_id = $input['cat_id'];
        $items->save();

        return redirect('/admin/content/post');
    }

    public function destroy($id){

        $items = ContentPostModel::find($id);

        $items->delete();

        return redirect('/admin/content/post');
    }
}
