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

Route::get('/testemail', function () {
  Mail::send('emails.test', [], function ($message) {
    $message
      ->from('periyasamy@royalthrills.com', 'Yogesh Periyasamy')
      ->to('periyasamy@royalthrills.com', 'Bala Siva')
      ->subject('Welcome .. From Royalthrills with ❤');
  });
});

Route::group(['middleware' => 'auth'], function () {
    Route::resource('projects', 'ProjectsController');

    Route::post('/projects/{project}/tasks', 'ProjectTasksController@store');
    Route::patch('/projects/{project}/tasks/{task}', 'ProjectTasksController@update');

    Route::post('/projects/{project}/invitations', 'ProjectInvitationsController@store');

    Route::get('/home', 'HomeController@index')->name('home');
});

Auth::routes();
