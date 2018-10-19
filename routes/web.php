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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::post('/homelogo', 'BackOffice\CalendarController@homelogo')->name('homelogo');
Route::post('/awaylogo', 'BackOffice\CalendarController@awaylogo')->name('awaylogo');

Route::prefix('admin')->group(function() {
  Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
  Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
  Route::get('/home', 'BackOffice\AdminController@index')->name('admin.dashboard');
  Route::resource('/news', 'BackOffice\NewsController');
  Route::resource('/sportsci', 'BackOffice\SportSciController');
  Route::resource('/vdo', 'BackOffice\VdoController');
  Route::resource('/calendar', 'BackOffice\CalendarController');
  Route::get('/calendar/editScore/{id}', 'BackOffice\CalendarController@editScore')->name('calendar.editScore');
  Route::patch('/calendar/updateScore/{id}', 'BackOffice\CalendarController@updateScore')->name('calendar.updateScore');
  Route::resource('/teams', 'BackOffice\TeamsController');
  Route::resource('/tag', 'BackOffice\TagController');
  Route::resource('/users', 'BackOffice\UsersController');

  Route::resource('/category', 'BackOffice\Webboard\CategoryController');
  
  Route::resource('/posts', 'BackOffice\Webboard\PostsController');
  Route::get('/posts/CreatePosts/{id}', 'BackOffice\Webboard\PostsController@CreatePosts')->name('posts.CreatePosts');

  Route::resource('/comment', 'BackOffice\Webboard\CommentController');

});
