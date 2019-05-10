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
use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Countries;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
//    $obj = App\Countries::with(['users', 'posts'])->where('id',1)->get();
//    $obj1 = App\Countries::usersWithPosts()->where('id',1);
//    dd(App\Countries::with(['users', 'posts'])->where('id',1)->get()->toArray());
//    dd(App\User::with(['videos'])->where('id',1)->get()->toArray());

//    dd(App\Product::first()->where(['user_id' => 1])->get()->toArray());

    return view('welcome');
});

Route::get('/', 'HomeController@paymentView');

Auth::routes();


Route::group(['middleware' => 'auth'], function () {

    Route::get('/home', 'HomeController@index')->name('home');


    Route::group(['middleware' => 'role:employee|admin|superadmin'], function () {
        Route::get('employee/dashboard', 'EmployeeController@index')->name('employee.dashboard');
        Route::get('/post/create', 'PostController@create')->name('post.create');
        Route::post('/post/store', 'PostController@store')->name('post.store');
        Route::get('/posts', 'PostController@index')->name('posts');
        Route::get('/post/show/{id}', 'PostController@show')->name('post.show');
        Route::post('/comment/store', 'CommentController@store')->name('comment.add');
        Route::post('/reply/store', 'CommentController@replyStore')->name('reply.add');
    });

    Route::group(['middleware' => 'role:manager|admin|superadmin'], function () {
        Route::get('manager/dashboard', 'ManagerController@index')->name('manager.dashboard');

        Route::get('/events', 'EventsController@index')->name('events');
        Route::get('/event/create', 'EventsController@create')->name('event.create');
        Route::post('/event/store', 'EventsController@store')->name('event.store');
        Route::get('/event/show/{id}', 'EventsController@show')->name('event.show');

        Route::post('/review/store', 'ReviewController@store')->name('review.add');
        Route::post('/review/delete', 'ReviewController@delete')->name('review.delete');
    });



    Route::get('/videos', 'VideoController@index')->name('videos');
    Route::get('/video/create', 'VideoController@create')->name('video.create');
    Route::post('/video/store', 'VideoController@store')->name('video.store');
    Route::get('/video/show/{id}', 'VideoController@show')->name('video.show');
    Route::post('/comment/video_store', 'CommentController@videoStore')->name('comment.video_store');
    Route::post('/comment/video_comment_reply', 'CommentController@videoReplyStore')->name('comment.video_comment_reply');



});