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
Route::get("/trangchu/product_details", "quanlybanhangController@getProductDetails")->name("oneproduct");
Route::get("/trangchu/blog", "quanlybanhangController@getBlog")->name("blog");
Route::get("/trangchu/cart", "quanlybanhangController@getCart")->name("cart");
Route::get("/trangchu/type-product/{type}", "quanlybanhangController@getTypeProduct")->name("typecatelory");






