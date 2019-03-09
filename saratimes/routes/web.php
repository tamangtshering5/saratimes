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
Route::group(['namespace'=>'frontend'],function(){
   Route::get('/','pagesController@index')->name('index');
   Route::get('/singlepage/{slug?}','pagesController@singlepage')->name('singlepage');
   Route::get('/detailpage/{slug?}','pagesController@detailpage')->name('detailpage');
   Route::get('/subsinglepage/{slug?}','pagesController@subsinglepage')->name('subsinglepage');
    Route::get('/subdetailpage/{slug?}','pagesController@subdetailpage')->name('subdetailpage');

    Route::post('/comment','pagesController@comment')->name('comment');
    Route::get('/comments/{id}','pagesController@comments')->name('comments');

});

Route::group(['namespace'=>'backend'],function(){
    Route::post('/logout', 'adminController@logout')->name('logout');
    Route::get('/@dashboard@', 'adminController@login')->name('login');
    Route::post('login', 'adminController@login_action')->name('login_action');

});

Route::get('/test',function (){
   /*$post=\App\Catagory::find(5)->Post;
   return $post;*/
   return view('frontend.pages.jpt');
});

Route::post('/hell','backend\postController@hell');


Route::group(['namespace'=>'backend','middleware'=>'auth','prefix'=>'dashboard'],function() {
    Route::get('/', 'adminController@dashboard')->name('home');
    Route::get('register', 'adminController@register')->name('register');
    Route::post('register', 'adminController@register_action')->name('register_action');
    Route::get('/profile', 'adminController@profile')->name('profile');
    Route::get('/edit_userprofile', 'adminController@edit_userprofile')->name('edit_userprofile');
    Route::post('/edit_userprofile', 'adminController@userprofile_action')->name('userprofile_action');
    Route::get('/edit_adminprofile', 'adminController@edit_adminprofile')->name('edit_adminprofile');
    Route::post('/edit_adminprofile', 'adminController@adminprofile_action')->name('adminprofile_action');
    Route::post('/profile_del', 'adminController@profile_del')->name('profile_del');
    Route::post('/passwprd', 'adminController@password_action')->name('password_action');

});

/*Route::group(['middleware' => 'auth'], function () {
    Route::get('/laravel-filemanager', '\UniSharp\LaravelFilemanager\Controllers\LfmController@show');
    Route::post('/laravel-filemanager/upload', '\UniSharp\LaravelFilemanager\Controllers\UploadController@upload');
    // list all lfm routes here...
});*/

Route::group(['namespace'=>'backend','middleware'=>'auth','prefix'=>'dashboard'],function(){
   Route::get('/category','pagesController@category')->name('category');
   Route::post('/catagory','pagesController@catagory_action')->name('catagory_action');
   Route::post('/catagory-del','pagesController@catagory_del')->name('catagory_del');
   Route::get('/catagory-edit','pagesController@catagory_edit')->name('catagory_edit');
   Route::post('/catagory-edit','pagesController@catagoryedit_action')->name('catagoryedit_action');

   Route::get('/sub-catagory','pagesController@sub_catagory')->name('subcatagory');
   Route::post('/sub-catagory','pagesController@subcatagory_action')->name('subcatagory_action');
   Route::post('/subcatagory-del','pagesController@subcatagory_del')->name('subcatagory_del');
   Route::get('/subcatagory-edit','pagesController@subcatagory_edit')->name('subcatagory_edit');
   Route::post('/subcatagory-edit','pagesController@subcatagoryedit_action')->name('subcatagoryedit_action');

   /*/////////bigyapan//////////////*/
   Route::get('/bigyapan','bigyapanController@bigyapan')->name('bigyapan');
   Route::get('/subcatagory-select','bigyapanController@subcatagory_select');
    Route::post('/bigyapan','bigyapanController@bigyapan_action')->name('bigyapan_action');
    Route::get('/cataad-find','bigyapanController@cataad_find');
    Route::get('/subcataad-find','bigyapanController@subcataad_find');
    Route::post('/cataad-del','bigyapanController@cataad_del')->name('cataad_del');
    Route::get('/cataad-edit','bigyapanController@cataad_edit')->name('cataad_edit');
    Route::post('/cataad-edit','bigyapanController@cataadedit_action')->name('cataadedit_action');
    Route::get('/subcataad-edit','bigyapanController@subcataad_edit')->name('subcataad_edit');
    Route::post('/subcataad-edit','bigyapanController@subcataadedit_action')->name('subcataadedit_action');

    /*///////////////post/////////////////*/
    Route::get('/post','postController@post')->name('post');
    Route::post('/post','postController@post_action')->name('post_action');
    Route::get('/catacheck-find','postController@catacheck_find');
    Route::get('/catapost-find','postController@catapost_find');
    Route::get('/catapost-edit','postController@catapost_edit')->name('catapost_edit');
    Route::post('/catapost-edit','postController@catapostedit_action')->name('catapostedit_action');
    Route::post('/catapost-del','postController@catapost_del')->name('catapost_del');
    Route::get('/subcatapost-find','postController@subcatapost_find');
    Route::get('/subcatapost-edit','postController@subcatapost_edit')->name('subcatapost_edit');
    Route::post('/subcatapost-edit','postController@subcatapostedit_action')->name('subcatapostedit_action');
    Route::post('/subcatapost-del','postController@subcatapost_del')->name('subcatapost_del');



    /*///////////////////notification//////////////*/
    Route::post('allcomments', 'notificationController@bookingMessages');
    Route::get('/allcomment','notificationController@viewbookingMessages')->name('allbooking-message');
    Route::get('allbooking-view','notificationController@allbooking_view')->name('allbooking-view');
    Route::post('/allbooking-delete','notificationController@allbooking_delete_action')->name('allbooking-delete');
    Route::get('/comment-post','notificationController@comment_post')->name('comment_post');

    /*///////////////video////////////*/
    Route::get('/video','pagesController@video')->name('video');
    Route::post('/video','pagesController@video_action')->name('video_action');
    Route::get('/video-edit','pagesController@video_edit')->name('video_edit');
    Route::post('/video-edit','pagesController@videoedit_action')->name('videoedit_action');
    Route::post('/video-del','pagesController@video_del')->name('video_del');

    /*/////////settings//////////////*/
    Route::get('/settings','settingsController@settings')->name('settings');
    Route::post('/company','settingsController@company_action')->name('company_action');
    Route::post('/social','settingsController@social_action')->name('social_action');
    Route::post('/seo','settingsController@seo_action')->name('seo_action');



});




//..................frontend.......................

