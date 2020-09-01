<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Model\Admin\ContentPageModel;

class ContentPageController extends Controller
{
    //
    public function index(){
        $items = DB::table('content_pages')->paginate(10);
        /*
         * Đây là biến truyền từ controller xuống view
         */

        $data = array();

        $data['pages'] = $items;
        return view('admin.content.content.page.index', $data);
    }

    public function create(){
        $data = array();
        $items = ContentPageModel::all();
        $data['pages'] = $items;
        return view('admin.content.content.page.submit', $data);
    }

    public function edit($id){
        /*
             * Đây là biến truyền từ controller xuống view
             */

        $data = array();
        $items = ContentPageModel::find($id);
        $data['pages'] = $items;

        return view('admin.content.content.page.edit', $data);
    }

    public function delete($id){
        /*
                 * Đây là biến truyền từ controller xuống view
                 */

        $data = array();
        $items = ContentPageModel::find($id);
        $data['pages'] = $items;

        return view('admin.content.content.page.delete', $data);
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

    public function update(Request $request, $id){

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required',
            'images' => 'required',
            'intro' => 'required',
            'desc' => 'required',



        ]);

        $input = $request->all();

        $items = ContentPageModel::find($id);
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

    public function destroy($id){

        $items = ContentPageModel::find($id);

        $items->delete();

        return redirect('/admin/content/page');
    }
}
