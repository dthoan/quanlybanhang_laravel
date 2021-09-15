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

Route::get('/tho01', function () {
    return view('Buoi01.Buoi01');
});

Route::get('/bai1', function () {
    return view('Buoi01.Bai1');
});

Route::get('/bai2', function () {
    return view('Buoi01.bai02');
});

Route::get('/bai3', function () {
    return view('Buoi01.bai03');
});

Route::get('/bai4', function () {
    return view('Buoi01.bai04');
});
// không truyền tham số
Route::get('/chaoban', function () {
    return view('buoi2.thamso01');
});
// truyền 1 tham số
Route::get('/chaoban/{ten}', function ($ten) {
    return view('buoi2.thamso01', compact('ten'));
});
// truyền 2 ham số
Route::get('/chaoban/{ten}/{tuoi}', function ($ten,$tuoi) {
    return view('buoi2.thamso01', compact('ten','tuoi'));
});

// giải thương trinh
Route::get('/GiaiPT', function () {
    return view('buoi2.GiaiPT');
});


Route::get('/GiaiPT/{a}/{b}', "Baitap@hienketqua");

// bài tập buoi03

Route::get('/GiaiPhuongTrinhI', function () {
    return view('Buoi03.BaiTap');
});

Route::get('GiaiPhuongTrinhI/{a}/{b}', "Baitap@GiaiPhuongTrinhBaiTap1");

// chu vi
Route::get('/ChuVi', function () {
    return view('Buoi03.ChuVi');
});

Route::get("/trangchu", "Baitap@getIndex");
Route::get("/trangchu/html", "Baitap@getHtml");
Route::get("/trangchu/php", "Baitap@getPhp");
/// website bán hàng
Route::get("/trangchu/index", "quanlybanhangController@getIndex")->name("trangchu");
Route::get("/trangchu/product-details/{id}", "quanlybanhangController@getProductDetails")->name("detail_product");
// comment product
//Route::post("/trangchu/product_details/{id}", "quanlybanhangController@postComment")->name("detail_product");
Route::post("/trangchu/product-details/{id}", "quanlybanhangController@postCommentProduct")->name("detail_product");

//blog-contact-about
Route::get("/trangchu/blog", "quanlybanhangController@getBlog")->name("blog");
Route::get("/trangchu/blog-detail/{id}", "quanlybanhangController@getBlogDetail")->name("blog_detail");
// comment blog
Route::post("/trangchu/blog-detail/{id}", "quanlybanhangController@postCommentBlog")->name("blog_detail");

Route::get("/trangchu/contact", "quanlybanhangController@getContact")->name("contact");
Route::get("/trangchu/about", "quanlybanhangController@getabout")->name("about");
// cart
Route::get("/trangchu/cart", "quanlybanhangController@getCart")->name("cart");
// đặt hàng
Route::get("/trangchu/ckeckout", "quanlybanhangController@getCheckout")->name("checkout");
Route::post("/trangchu/ckeckout", "quanlybanhangController@postCheckout")->name("checkout");
Route::get("/trangchu/type-product/{type}", "quanlybanhangController@getTypeProduct")->name("typecatelory");
// giỏ hàng
Route::get("/trangchu/add-to-cart/{id}","quanlybanhangController@getAddtoCart")->name("themgiohang");
Route::get("/trangchu/del-item/{id}","quanlybanhangController@getDelItemCart")->name("delItem");

// admin đăng nhập
Route::get("/login", "quanlybanhangController@getLogin")->name('login');
Route::post("/login", "quanlybanhangController@postLogin")->name('login');
// comment
//Route::get("/posts/index", "postController@index")->name('comment');
Route::post("/posts/create", "postController@create")->name('create_comment');
Route::post("/posts/show/{id}", "postController@show");
//Route::post("/posts/show", "postController@show");
// đăng ký
Route::get("/register", "quanlybanhangController@getRegister")->name('register');
Route::post("/register", "quanlybanhangController@postRegister")->name('register');
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










