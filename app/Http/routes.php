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
//---------------------------------------------------------------

Route::get('/','Home\HomeController@index');
	Route::controller('/home','Home\HomeController');
//---------------------------------------------------------------

//前台Login登录
Route::controller('/home/login','Home\LoginController');	
//忘记密码
Route::controller('/home/forgetlogin','Home\forgetLoginController');
//首页展示数据
Route::controller('/home','Home\HomeController');
//后台register注册
//---邮箱
	//邮箱激活
Route::get('/home/register/status','Home\RegisterController@status');
//---手机
	//短信验证
Route::post('/home/register/sendcode','Home\RegisterController@sendcode');
//---AJAX验证
Route::controller('/home/ajax_register','Home\ajax_registerController');
//后台register处理
Route::resource('/home/register','Home\RegisterController');
/*
	前台路由组，对前台路由进行统一管理
*/

Route::group(['middleware'=>'home_login'],function(){
	
});
//---------------------------------------------------------------
/*
	后台路由组，对后台路由进行统一管理
 	header用来获取反馈
*/
Route::group(['middleware'=>['login','header']],function(){

	//后台主页控制器
	Route::get('/admin/index','Admin\AdminController@index');

	/**********付方政**********/
	//后台回收站列表控制器
	Route::get('/admin/recover/list','Admin\RecoverController@list');
	//后台广告回收站恢复控制器
	Route::get('/admin/recover/update/{id}','Admin\RecoverController@update');
	//后台广告回收站删除控制器
	Route::get('/admin/recover/delete/{id}','Admin\RecoverController@delete');
	//后台轮播回收站恢复控制器
	Route::get('/admin/recover/rupdate/{id}','Admin\RecoverController@rupdate');
	//后台轮播回收站删除控制器
	Route::get('/admin/recover/rdelete/{id}','Admin\RecoverController@rdelete');
	//后台反馈回收站恢复控制器
	Route::get('/admin/recover/fupdate/{id}','Admin\RecoverController@fupdate');
	//后台反馈回收站删除控制器
	Route::get('/admin/recover/fdelete/{id}','Admin\RecoverController@fdelete');
	//后台评论回收站恢复控制器
	Route::get('/admin/recover/cupdate/{id}','Admin\RecoverController@cupdate');
	//后台评论回收站删除控制器
	Route::get('/admin/recover/cdelete/{id}','Admin\RecoverController@cdelete');
	//后台用户回收站恢复控制器
	Route::get('/admin/recover/uupdate/{id}','Admin\RecoverController@uupdate');
	//后台用户回收站删除控制器
	Route::get('/admin/recover/udelete/{id}','Admin\RecoverController@udelete');
	//后台内容分类管理分类控制器
	Route::resource('/admin/type','Admin\TypeController');
	//后台添加内容控制器
	Route::resource('/admin/content','Admin\ContentController');
	
	/**********马可**********/
	//网站配置
	Route::get('/admin/config/index','Admin\ConfigController@index');
	Route::post('/admin/config/add','Admin\ConfigController@add');
	//更换轮播图
	Route::get('/admin/config/rollimg','Admin\ConfigController@rollimg');
	Route::post('/admin/config/insertimg','Admin\ConfigController@insertimg');
	Route::get('/admin/config/delete/{id}','Admin\ConfigController@delete');

	//发布管理
	Route::resource('/admin/release','Admin\ReleaseController');
	//未通过
	Route::resource('/admin/derelease','Admin\DereleaseController');

	/**********张智建**********/
	//后台广告控制器
	Route::resource('/admin/poster','Admin\PosterController');
	//后台评论管理
	Route::resource('/admin/comment','Admin\CommentController');

	//后台处理反馈控制器
	Route::resource('/admin/feedback','Admin\FeedbackController');

	/**********齐红运**********/
	//后台用户控制器
	Route::resource('/admin/user','Admin\User\UserController');

});
//访问后台login控制器
Route::controller('/admin','Admin\login\LoginController');
//---------------------------------------------------------------


