<?php
// Route::get('/', function () {
//      return ('Hello world!!!');
// });
Route::get ('/', 'IndexController@index');
Route::get('/home', 'HomeController@index')->name('home');
////////////////////////Settings////////////////////////////////////////////////////////
Route::get('/settings', 'UserController@profile')->name('settings');
Route::post('/settings', 'UserController@update_avatar');
Route::post('settings/update_password', 'UserController@update_password')->name('settings.update_password');
Route::post('settings/update_email','UserController@update_email')->name('settings.update_email');
//////////////////////////Comment///////////////////////////////////////////////////////
Route::post('/comment/store', 'CommentController@store')->name('comment.add');//маршрут для зберігання коментарів
Route::get('/posts', 'PostController@index')->name('posts');
Route::get('/post/show/{id}', 'PostController@show')->name('post.show');//маршрут для демонстрації 
Route::get('/post/create', 'PostController@create')->name('post.create');
Route::post('/post/store', 'PostController@store')->name('post.store');
Route::post('/reply/store', 'CommentController@replyStore')->name('reply.add');
/////////////////////////////Login////////////////////////////////////////////////////
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
////////////////////////////Register////////////////////////////////////////////////////
Route::get('register',array('as'=>'register','uses'=>'Auth\RegisterController@showRegistrationForm'));
Route::get('register/ajax/{id_country}',array('as'=>'register.ajax','uses'=>'Auth\RegisterController@regionAjax'))->name('register') ;
Route::get('register/{id_region}',array('as'=>'register.ajax','uses'=>'Auth\RegisterController@cityAjax')) ;
Route::post('register', 'Auth\RegisterController@register')->name('post.register');
Route::post('register/{email}', array('uses' => 'EmailAvaliable@check'));
//////////////////////////Password Reset/////////////////////////////////////////////////
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
