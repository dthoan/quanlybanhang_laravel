<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});





/// website bán hàng
Route::get("/", "quanlybanhangController@getIndex")->name("trangchu");
Route::get("/trangchu/product-details/{id}", "quanlybanhangController@getProductDetails")->name("detail_product");
// comment product
//Route::post("/trangchu/product_details/{id}", "quanlybanhangController@postComment")->name("detail_product");
Route::post("/trangchu/product-details/{id}", "quanlybanhangController@postCommentProduct")->name("detail_product");

//blog-contact-about
Route::get("/blog", "quanlybanhangController@getBlog")->name("blog");
Route::get("/add-post-blog", "postController@getAddPostBlog")->name("add_post_blog");
Route::post("/add-post-blog", "postController@postAddPost")->name("add_post_blog");
Route::get("/blog-detail/{id}", "quanlybanhangController@getBlogDetail")->name("blog_detail");
// comment blog
Route::post("/blog-detail/{id}", "quanlybanhangController@postCommentBlog")->name("blog_detail");

Route::get("/trangchu/contact", "quanlybanhangController@getContact")->name("contact");
Route::get("/trangchu/about", "quanlybanhangController@getabout")->name("about");
// cart
Route::get("/trangchu/cart", "quanlybanhangController@getCart")->name("cart");
// đặt hàng
Route::get("/trangchu/checkout", "quanlybanhangController@getCheckout")->name("checkout");
Route::post("/trangchu/checkout", "quanlybanhangController@postCheckout")->name("checkout");

Route::get("/trangchu/type-product/{type}", "quanlybanhangController@getTypeProduct")->name("typecatelory");
// giỏ hàng
Route::get("/trangchu/add-to-cart/{id}","quanlybanhangController@getAddtoCart")->name("themgiohang");
Route::get("/trangchu/del-item/{id}","quanlybanhangController@getDelItemCart")->name("delItem");
Route::get("/trangchu/reduce-item/{id}","quanlybanhangController@reduceProductInCart")->name("reduceItem");

// admin đăng nhập
Route::get("admin/login", "quanlybanhangController@getLogin")->name('login');
Route::post("admin/login", "quanlybanhangController@postLogin")->name('login');
// comment
//Route::get("/posts/index", "postController@index")->name('comment');
Route::post("/posts/create", "postController@create")->name('create_comment');
Route::post("/posts/show/{id}", "postController@show");
//Route::post("/posts/show", "postController@show");
// đăng ký
Route::get("admin/register", "quanlybanhangController@getRegister")->name('register');
Route::post("admin/register", "quanlybanhangController@postRegister")->name('register');
// đăng xuất
Route::get("/logout", "quanlybanhangController@getLogout")->name('logout');

Route::get("/search", "quanlybanhangController@getResearch")->name('search');

// trang quản trị
Route::get("/admin/index", "quanlybanhangController@getAdminIndex")->name('index');
// product
Route::get("/admin/list-product", "quanlybanhangController@getAllProduct")->name('list_product');
Route::get("/admin/add-product", "quanlybanhangController@getAddProduct")->name('add_product');
Route::post("/admin/add-product", "quanlybanhangController@postEditProduct")->name('add_product');
Route::post("/admin/edit-product/{id}", "quanlybanhangController@postEditProduct")->name('edit_product');
Route::get("/admin/edit-product/{id}", "quanlybanhangController@getEditProduct")->name('edit_product');
Route::get("/admin/delete-product/{id}", "quanlybanhangController@getDeleteProduct")->name('del_product');
// order
Route::get("/admin/list-order", "quanlybanhangController@getListOrder")->name('list_order');
Route::get("/admin/add-order", "quanlybanhangController@getAddOrder")->name('add_order');
Route::post("/admin/add-order", "quanlybanhangController@postAddOrder")->name('add_order');
Route::get("/admin/update-order", "quanlybanhangController@getAddOrder")->name('update_order');
Route::post("/admin/update-order", "quanlybanhangController@postAddOrder")->name('update_order');
Route::get("/admin/delete-order/{id}", "quanlybanhangController@getDeleteOrder")->name('del_order');
Route::get("/admin/detail/{id}", "quanlybanhangController@getDetailOrder")->name('detail_order');

// Route::post("/detail/{id}", "quanlybanhangController@postOrderStatus")->name('detail_order');
// customer
Route::get("/admin/list-customer", "quanlybanhangController@getListCustomer")->name('list_customer');
Route::get("/admin/detail-customer/{id}", "quanlybanhangController@getDetailCustomer")->name('detail_customer');
Route::get("/admin/edit-customer/{id}", "quanlybanhangController@getEditCustomer")->name('edit_customer');
Route::get("/admin/delete-customer/{id}", "quanlybanhangController@getDeleteCustomer")->name('del_customer');

Route::get("/admin/add-customer", "quanlybanhangController@getAddCustomer")->name('add_customer');
Route::post("/admin/add-customer", "quanlybanhangController@postAddCustomer")->name('add_customer');
// Danh mục sản phẩm
Route::get("/admin/list-category", "quanlybanhangController@getListCategory")->name('list_category');
Route::get("/admin/add-category", "quanlybanhangController@getAddCategory")->name('add_category');
Route::post("/admin/add-category", "quanlybanhangController@postAddCategory")->name('add_category');
Route::get("/admin/del-category/{id}", "quanlybanhangController@getDeleteCategory")->name('del_category');
Route::get("/admin/edit-category/{id}", "quanlybanhangController@getEditCategory")->name('edit_category');
Route::post("/admin/edit-category/{id}", "quanlybanhangController@postEditCategory")->name('edit_category');
// blog view là add_blog
Route::get("/trangchu/cau-hoi", "blogController@getAddBlog")->name('cau_hoi');
Route::post("/trangchu/cau-hoi", "blogController@postAddBlog")->name('cau_hoi');


// promotion
Route::get("/admin/list-promotion", "promotionController@getList")->name('list');
//////////add promotion
Route::post("/admin/add-promotion", "promotionController@postAddEdit")->name('add_edit');
Route::get("/admin/add-promotion", "promotionController@getAdd")->name('add');
//Route::get("/admin/add-promotion", "promotionController@getSearch")->name('add');
Route::get("/admin/add-promotion/fetch_data", "promotionController@fetch_data")->name('fetch_data');
//////////edit promotion
Route::post("/admin/edit-promotion", "promotionController@postAddEdit")->name('add_edit');
Route::get("/admin/edit-promotion/{id}", "promotionController@getEdit")->name('edit');
Route::get("/admin/edit-promotion/{id}", "promotionController@getSearch")->name('edit');
//////////del promotion
Route::get("/admin/del-promotion/{id}", "promotionController@getDelete")->name('del');

// Đăng nhập trang người dùng
Route::get("/login", "loginController@getLogin")->name('trangchuLogin');
Route::post("/login", "loginController@postLogin")->name('trangchuLogin');
// đăng ký trang chủ
Route::get("/dangky", "loginController@getTrangchuRegister")->name('trangchuRegister');
Route::post("/dangky", "loginController@postTrangchuRegister")->name('trangchuRegister');

Route::get("/register-role", "loginController@createRolePermission");
// role user
Route::get("/admin/active", "userController@getUser")->name('role');
Route::post("/admin/active", "userController@postRole")->name('role');
// my account
Route::get("/account/{id}", "accountController@getAccount")->name('account');
Route::get("admin/list-account", "accountController@getListAccount")->name('list_taikhoan');
// yêu cầu active
Route::get("trangchu/active", "accountController@getActive")->name('q_active');
Route::post("trangchu/active", "accountController@postActive")->name('q_active');
Route::get("loginfb", "loginController@loginFb")->name('loginfb');





//chat
//Route::get('chat', 'chatsController@index');
//Route::get('messages', 'chatController@fetchMessages');
//Route::post('messages', 'chatController@sendMessage');
//
Route::group(['middleware' => ['role:Admin']], function () {
//    Route::get("/admin/user", "userController@getUser");

});








