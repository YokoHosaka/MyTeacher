<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

// Route::get('/', 'KnowledgesController@index');
// Route::resource('knowledges', 'KnowledgesController');

//ユーザー登録　
Route::get('signup', 'Auth\AuthController@getRegister')->name('signup.get');
Route::post('signup', 'Auth\AuthController@postRegister')->name('signup.post');

//ログイン認証
Route::get('login', 'Auth\AuthController@getLogin')->name('login.get');
Route::post('login', 'Auth\AuthController@postLogin')->name('login.post');
Route::get('logout', 'Auth\AuthController@getLogout')->name('logout.get');

//ログイン後の操作
Route::group(['middleware' => 'auth'], function() {
Route::resource('knowledges', 'KnowledgesController');    
Route::get('register', 'KnowledgesController@register')->name('knowledges.register'); //knowledge登録画面への遷移ルーティング
Route::get('confirm', 'KnowledgesController@confirm')->name('knowledges.confirm'); //登録内容確認画面表示
Route::post('confirm', 'KnowledgesController@confirm')->name('knowledges.confirm');
Route::get('stored', 'KnowledgesController@stored')->name('knowledges.stored');
Route::post('stored', 'KnowledgesController@stored')->name('knowledges.stored');

Route::resource('fields', 'FieldsController');

});
