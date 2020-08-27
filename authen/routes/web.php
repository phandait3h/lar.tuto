<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('frontend.homepages.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// GOM NHÓM CHO QUẢN TRỊ VIÊN

Route::prefix('admin')->group(function (){
    /*
     * ------------------ Route Admin Authentication ---------------------------
     * -------------------------------------------------------------------------
     * -------------------------------------------------------------------------
     */

    //trả về view dashboard
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/dashboard', 'AdminController@index')->name('admin.dashboard');

    //view đăng ký
    Route::get('register', 'AdminController@create')->name('admin.register');
    //xử lý thông tin đăng kí
    Route::post('register','AdminController@store')->name('admin.register.store');

    //view đăng nhập admin
    Route::get('login', 'Auth\Admin\LoginController@login')->name('admin.auth.login');
    //xử lý thông tin đăng nhập
    Route::post('login', 'Auth\Admin\LoginController@loginAdmin')->name('admin.auth.loginAdmin');

    //đăng xuất
    Route::post('logout', 'Auth\Admin\LoginController@logout')->name('admin.auth.logout');

    /*
     * ------------------ Route Admin Shopping ---------------------------
     * -------------------------------------------------------------------------
     * -------------------------------------------------------------------------
     */

    Route::get('shop/category', 'Admin\ShopCategoryController@index');
    Route::get('shop/category/create', 'Admin\ShopCategoryController@create');
    Route::get('shop/category/{id}/edit', 'Admin\ShopCategoryController@edit');
    Route::get('shop/category/{id}/delete', 'Admin\ShopCategoryController@delete');

    Route::post('shop/category/', 'Admin\ShopCategoryController@store');
    Route::post('shop/category/{id}', 'Admin\ShopCategoryController@update');
    Route::post('shop/category/{id}/delete', 'Admin\ShopCategoryController@destroy');

    /*
         * ------------------ Route Admin Shopping Products ---------------------------
         * -------------------------------------------------------------------------
         * -------------------------------------------------------------------------
         */

    Route::get('shop/product', 'Admin\ShopProductController@index');
    Route::get('shop/product', 'Admin\ShopProductController@index');
    Route::get('shop/product/create', 'Admin\ShopProductController@create');
    Route::get('shop/product/{id}/edit', 'Admin\ShopProductController@edit');
    Route::get('shop/product/{id}/delete', 'Admin\ShopProductController@delete');

    Route::post('shop/product/', 'Admin\ShopProductController@store');
    Route::post('shop/product/{id}', 'Admin\ShopProductController@update');
    Route::post('shop/product/{id}/delete', 'Admin\ShopProductController@destroy');

    Route::get('shop/order', function (){
        return view('admin.content.shop.order.index');
    });

    Route::get('shop/brand', function (){
        return view('admin.content.shop.brand.index');
    });

    Route::get('shop/review', function (){
        return view('admin.content.shop.review.index');
    });

    Route::get('shop/statistic', function (){
        return view('admin.content.shop.statistic.index');
    });

    Route::get('shop/customer', function (){
        return view('admin.content.shop.customer.index');
    });

    Route::get('shop/product/order', function (){
        return view('admin.content.shop.adminorder.index');
    });

    /*
     * ------------------ Route Admin Content ----------------------------------
     * -------------------------------------------------------------------------
     * -------------------------------------------------------------------------
     */

    Route::get('content/category', function (){
        return view('admin.content.content.category.index');
    });

    Route::get('content/post', function (){
        return view('admin.content.content.post.index');
    });

    Route::get('content/page', function (){
        return view('admin.content.content.page.index');
    });

    Route::get('content/tag', function (){
        return view('admin.content.content.tag.index');
    });

    /*
     * ------------------ Route Admin Menu ----------------------------------
     * -------------------------------------------------------------------------
     * -------------------------------------------------------------------------
     */

    Route::get('menu', function (){
        return view('admin.content.menu.index');
    });

    Route::get('menuitems', function (){
        return view('admin.content.menuitem.index');
    });

    /*
     * ------------------ Route Admin Users ----------------------------------
     * -------------------------------------------------------------------------
     * -------------------------------------------------------------------------
     */
    Route::get('users', function (){
        return view('admin.content.users.index');
    });

    /*
     * ------------------ Route Admin media ----------------------------------
     * -------------------------------------------------------------------------
     * -------------------------------------------------------------------------
     */
    Route::get('media', function (){
        return view('admin.content.media.index');
    });

    /*
     * ------------------ Route Admin config ----------------------------------
     * -------------------------------------------------------------------------
     * -------------------------------------------------------------------------
     */
    Route::get('config', function (){
        return view('admin.content.config.index');
    });

    /*
     * ------------------ Route Admin newletters ----------------------------------
     * -------------------------------------------------------------------------
     * -------------------------------------------------------------------------
     */
    Route::get('newsletters', function (){
        return view('admin.content.newsletters.index');
    });

    /*
     * ------------------ Route Admin banners ----------------------------------
     * -------------------------------------------------------------------------
     * -------------------------------------------------------------------------
     */
    Route::get('banners', function (){
        return view('admin.content.banners.index');
    });

    /*
     * ------------------ Route Admin contact ----------------------------------
     * -------------------------------------------------------------------------
     * -------------------------------------------------------------------------
     */
    Route::get('contact', function (){
        return view('admin.content.contact.index');
    });

    /*
     * ------------------ Route Admin Email ----------------------------------
     * -------------------------------------------------------------------------
     * -------------------------------------------------------------------------
     */
    Route::get('email/inbox', function (){
        return view('admin.content.email.inbox.index');
    });
    Route::get('email/draft', function (){
        return view('admin.content.email.draft.index');
    });
    Route::get('email/send', function (){
        return view('admin.content.email.send.index');
    });
});
//gom nhóm cho người bán hàng
Route::prefix('seller')->group(function () {
    //trả về view dashboard
    Route::get('/', 'SellerController@index')->name('seller.dashboard');
    Route::get('/dashboard', 'SellerController@index')->name('seller.dashboard');


    //view đăng ký
    Route::get('register', 'SellerController@create')->name('seller.register');
    //xử lý thông tin đăng kí
    Route::post('register','SellerController@store')->name('seller.register.store');


    //view đăng nhập seller
    Route::get('login', 'Auth\Seller\LoginController@login')->name('seller.auth.login');
    //xử lý thông tin đăng nhập
    Route::post('login', 'Auth\Seller\LoginController@loginSeller')->name('seller.auth.loginSeller');

    //đăng xuất
    Route::post('logout', 'Auth\Seller\LoginController@logout')->name('seller.auth.logout');
});


//gom nhóm cho bên vận chuyển
Route::prefix('shipper')->group(function () {
    //trả về view dashboard
    Route::get('/', 'ShipperController@index')->name('shipper.dashboard');
    Route::get('/dashboard', 'ShipperController@index')->name('shipper.dashboard');


    //view đăng ký
    Route::get('register', 'ShipperController@create')->name('shipper.register');
    //xử lý thông tin đăng kí
    Route::post('register','ShipperController@store')->name('shipper.register.store');


    //view đăng nhập seller
    Route::get('login', 'Auth\Shipper\LoginController@login')->name('shipper.auth.login');
    //xử lý thông tin đăng nhập
    Route::post('login', 'Auth\Shipper\LoginController@loginShipper')->name('shipper.auth.loginSeller');

    //đăng xuất
    Route::post('logout', 'Auth\Shipper\LoginController@logout')->name('shipper.auth.logout');
});