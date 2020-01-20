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

Route::group(['prefix' => 'quan-ly','namespace'=>'backend'], function () {

    Route::group(['middleware' =>'auth.backend'], function () {
        Route::resource('/san-pham', 'productcontroller');
        Route::resource('/don-hang', 'ordercontroller');
        Route::resource('/nha-cung-cap', 'suppliercontroller');
        Route::resource('/danh-muc', 'categorycontroller');
        Route::resource('/khach-hang', 'customercontroller');
        Route::resource('/quan-tri', 'usercontroller');
        Route::resource('/thuong-hieu', 'brandcontroller');
        Route::get('/dang-xuat', 'logincontroller@logout')->name('b.dangxuat');
    });
    // dang nhap
    Route::get('/dang-nhap', 'logincontroller@login')->name('b.dangnhap');
    Route::post('/dang-nhap', 'logincontroller@loginPost')->name('b.dangnhappost');
});

// test
Route::get('/form','testvalidation@form')->name('test');
Route::post('/form','testvalidation@formpost')->name('post');
Route::get('/testemail','testguiemailController@index')->name('testemail');
Route::post('/testemail','testguiemailController@gui')->name('guimail');

// ajax: 8/1/2020
Route::get('/testform','testformController@index')->name('testform');
Route::post('/testform','testformController@post1')->name('testpost1');

Route::get('/testform2','testformController@index2')->name('testform2');
Route::post('/testform2','testformController@post2')->name('testpost2');


Auth::routes();

Route::group(['middleware' => 'language'], function () {
    Route::get('/','frontend\homeController@index')->name('home');
    Route::view('/contact', 'frontend\contact')->name('contact');
    Route::get('/cart', 'frontend\cartController@index')->name('cart');
    Route::get('/product/{id}', 'frontend\productController@proDetail')->name('proDetail');
});
Route::get('change-language-{language}', 'listLanguage@changeLang')->name('changeLang');