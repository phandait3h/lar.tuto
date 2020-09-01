<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\ShopCategoryModel;
use App\Model\Admin\ShopProductModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ShopProductController extends Controller
{
    //
    public function index(){
        $items = DB::table('shop_products')->paginate(10);
        /*
         * Đây là biến truyền từ controller xuống view
         */

        $data = array();
        $data['products'] = $items;
        $cats = ShopCategoryModel::all();
        $data['cats'] = $cats;
        return view('admin.content.shop.product.index', $data);
    }

    public function create(){
        $data = array();
        $cats = ShopCategoryModel::all();
        $data['cats'] = $cats;

        return view('admin.content.shop.product.submit', $data);
    }

    public function edit($id){
        /*
             * Đây là biến truyền từ controller xuống view
             */

        $data = array();
        $items = ShopProductModel::find($id);
        $data['products'] = $items;
        $cats = ShopCategoryModel::all();
        $data['cats'] = $cats;
        return view('admin.content.shop.product.edit', $data);
    }

    public function delete($id){
        /*
                 * Đây là biến truyền từ controller xuống view
                 */

        $data = array();
        $items = ShopProductModel::find($id);
        $data['products'] = $items;

        return view('admin.content.shop.product.delete', $data);
    }

    public function store(Request $request){

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required',
            'images' => 'required',
            'intro' => 'required',
            'desc' => 'required',
            'priceCore' => 'required',
            'priceSale' => 'required',
            'stock' => 'required',
        ]);

        $input = $request->all();

        $items = new ShopProductModel();
        $items->name = $input['name'];
        $items->slug = $input['slug'];
        $items->images = $input['images'];
        $items->intro = $input['intro'];
        $items->desc = $input['desc'];
        $items->priceCore = $input['priceCore'];
        $items->priceSale = $input['priceSale'];
        $items->stock = $input['stock'];
        $items->cat_id = $input['cat_id'];
        $items->save();

        return redirect('/admin/shop/product');
    }

    public function update(Request $request, $id){

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required',
            'images' => 'required',
            'intro' => 'required',
            'desc' => 'required',
            'priceCore' => 'required',
            'priceSale' => 'required',
            'stock' => 'required',

        ]);

        $input = $request->all();

        $items = ShopProductModel::find($id);
        $items->name = $input['name'];
        $items->slug = $input['slug'];
        $items->images = $input['images'];
        $items->intro = $input['intro'];
        $items->desc = $input['desc'];
        $items->priceCore = $input['priceCore'];
        $items->priceSale = $input['priceSale'];
        $items->stock = $input['stock'];
        $items->cat_id = $input['cat_id'];
        $items->save();

        return redirect('/admin/shop/product');
    }

    public function destroy($id){

        $items = ShopProductModel::find($id);

        $items->delete();

        return redirect('/admin/shop/product');
    }
}
