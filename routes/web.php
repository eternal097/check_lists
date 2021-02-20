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
//Authentication
Auth::routes();

//Redirect start app
Route::get('/', function () {
    return redirect()->route('profile');
})->name('home');

//User panel
Route::get('/profile', 'ProfileController@show')->name('profile');

Route::get('/checklists', 'ChecklistController@index')->name('checklists');

Route::get('/checklists/{id}/tasks', 'TaskController@index')->name('tasks');

Route::resource('checklist', 'ChecklistController');

Route::resource('task', 'TaskController');

//Admin panel
Route::prefix('admin')->group(function () {
  
    Route::get('/', 'AdminController@show')->name('adminpanel');

    Route::get('/users', 'AdminController@showUserslist')->name('users');

    Route::get('/admins', 'AdminController@showAdminslist')->name('admins');

    Route::get('/checklists/{id}/tasks', 'AdminController@showTasks')->name('userTasks');

    Route::get('/checklists', 'AdminController@allChecklists')->name('allChecklists');

    Route::patch('/user/{id}}', 'AdminController@userUpdate')->name('userUpdate');

    Route::patch('/role/{id}}', 'AdminController@roleUpdate')->name('roleUpdate');

    Route::patch('/permission/{id}}', 'AdminController@permissionUpdate')->name('permissionUpdate');
});
