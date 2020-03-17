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

use App\Http\Controllers\TestController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

/* START ADMIN PLUGIN */
Route::get('/home', 'HomeController@index')->name('home');

Route::get('admin', 'Admin\AdminController@index');

Route::resource('admin/roles', 'Admin\RolesController');

Route::resource('admin/permissions', 'Admin\PermissionsController');

Route::resource('admin/users', 'Admin\UsersController');

Route::resource('admin/pages', 'Admin\PagesController');

Route::resource('admin/activitylogs', 'Admin\ActivityLogsController')->only([
    'index', 'show', 'destroy'
]);

Route::resource('admin/settings', 'Admin\SettingsController');

Route::get('admin/generator', ['uses' => '\Appzcoder\LaravelAdmin\Controllers\ProcessController@getGenerator']);

Route::post('admin/generator', ['uses' => '\Appzcoder\LaravelAdmin\Controllers\ProcessController@postGenerator']);

Route::resource('post', 'PostController');

Route::resource('follow', 'FollowController');

Route::resource('post', 'PostController');
/* END ADMIN PLUGIN */

Route::get('/test/session', 'TestController@printSession');

/* show all followed posts */
Route::get('/test/all', 'TestController@getAllPosts');

/* show all posts of a followed user */
Route::get('/test/{id_user}', function($id_user) {
    $Test = new TestController();

    $Test->getPosts($id_user);
});