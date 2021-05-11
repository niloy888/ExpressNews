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

/*Route::get('/', function () {
    return view('welcome');
});*/

//client side
Route::get('/','Front\ExpressNewsController@index')->name('/');
Route::get('/article/{id}','Front\ExpressNewsController@singleArticle')->name('single-article');
Route::get('/category/articles/{id}','Front\ExpressNewsController@categoryArticles')->name('category-post');
Route::get('/login/user/','Front\ClientController@login')->name('user-login');
Route::post('/login/process/','Front\ClientController@loginProcess')->name('login-process');
Route::get('/register/user/','Front\ClientController@register')->name('user-register');
Route::get('/verify/user/','Front\ClientController@verifyUser')->name('verify-user');
Route::post('/register/process/','Front\ClientController@registerProcess')->name('register-process');
Route::get('/logout/user/','Front\ClientController@logout')->name('user-logout');
Route::get('/user/reset/password','Front\ClientController@resetPassword')->name('user-password-reset');
Route::post('/sendemail/send', 'Front\PasswordResetController@send');
Route::get('/password/new/','Front\PasswordResetController@newPassword')->name('new-password');


Route::post('/comment/submit/','Front\CommentController@submitComment')->name('comment-submit');


//admin
//Route::get('/','ExpressNewsController@index')->name('/');
Route::group(['middleware' => ['auth']], function(){

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/admin/category/add', 'Admin\CategoryController@addCategory')->name('add-category');
    Route::post('/admin/category/new', 'Admin\CategoryController@newCategory')->name('new-category');
    Route::get('/admin/category/manage','Admin\CategoryController@manageCategory')->name('manage-category');
    Route::get('/admin/category/edit/{id}','Admin\CategoryController@editCategory')->name('edit-category');
    Route::post('/admin/category/update', 'Admin\CategoryController@updateCategory')->name('update-category');
    Route::post('/admin/category/delete','Admin\CategoryController@deleteCategory')->name('delete-category');

    Route::get('/admin/post/add', 'Admin\PostController@addPost')->name('add-post');
    Route::post('/admin/post/new', 'Admin\PostController@newPost')->name('new-post');
    Route::get('/admin/post/manage','Admin\PostController@managePost')->name('manage-post');
    Route::get('/admin/post/edit/{id}','Admin\PostController@editPost')->name('edit-post');
    Route::post('/admin/post/update', 'Admin\PostController@updatePost')->name('update-post');
    Route::post('/admin/post/delete','Admin\PostController@deletePost')->name('delete-post');

    Route::get('/admin/manage-comments/{id}','Admin\PostController@manageComments')->name('manage-comments');
    Route::get('/admin/change-comment-status/{id}','Admin\PostController@changeCommentStatus')->name('change-comment-status');


    Route::get('/admin/today-all-news', 'Admin\TodayNewsController@manageTodayAllNews')->name('manage-today-news');
    Route::get('/admin/today-breaking-news','Admin\TodayNewsController@manageTodayBreakingNews')->name('manage-breaking-news');
    Route::post('/admin/add-breaking-news', 'Admin\TodayNewsController@addBreakingNews')->name('add-breaking-news');

    Route::get('/admin/manage-reporters', 'Admin\ReportersController@manageReporters')->name('manage-reporters');
    Route::get('/admin/change-reporter-status/{id}', 'Admin\ReportersController@changeReporterStatus')->name('change-reporter-status');

    Route::get('/admin/manage-clients', 'Admin\PostController@manageClients')->name('manage-clients');
    Route::get('/admin/change-client-status/{id}','Admin\PostController@changeClientStatus')->name('change-client-status');


});




Auth::routes();



//reporter

Route::get('/reporter/login', 'Reporter\AuthController@login')->name('reporter-login');
Route::post('/reporter-login-process', 'Reporter\AuthController@loginProcess')->name('reporter-login-process');
Route::get('/reporter/register', 'Reporter\AuthController@register')->name('reporter-register');
Route::post('/reporter-registration-process', 'Reporter\AuthController@registerProcess')->name('reporter-register-process');

Route::group(['middleware' => ['verifyReporter']], function(){

    Route::post('/reporter/logout', 'Reporter\AuthController@logout')->name('reporter-logout');

    Route::get('/reporter/dashboard', 'Reporter\HomeController@index')->name('reporter-dashboard');

    Route::get('/reporter/post/add', 'Reporter\PostController@addPost')->name('reporter-add-post');
    Route::post('/reporter/post/new', 'Reporter\PostController@newPost')->name('reporter-new-post');
    Route::get('/reporter/post/manage','Reporter\PostController@managePost')->name('reporter-manage-post');
    Route::get('/reporter/post/edit/{id}','Reporter\PostController@editPost')->name('reporter-edit-post');
    Route::post('/reporter/post/update', 'Reporter\PostController@updatePost')->name('reporter-update-post');
    Route::post('/reporter/post/delete','Reporter\PostController@deletePost')->name('reporter-delete-post');

    Route::get('/reporter/manage-comments/{id}','Reporter\PostController@manageComments')->name('reporter-manage-comments');
    Route::get('/reporter/change-comment-status/{id}','Reporter\PostController@changeCommentStatus')->name('reporter-change-comment-status');

    Route::get('/reporter/change-client-status/{id}','Reporter\PostController@changeClientStatus')->name('reporter-change-client-status');

    Route::get('/reporter/today-all-news', 'Reporter\TodayNewsController@manageTodayAllNews')->name('reporter-manage-today-news');
    Route::get('/reporter/today-breaking-news','Reporter\TodayNewsController@manageTodayBreakingNews')->name('reporter-manage-breaking-news');
    Route::post('/reporter/add-breaking-news', 'Reporter\TodayNewsController@addBreakingNews')->name('reporter-add-breaking-news');


});

