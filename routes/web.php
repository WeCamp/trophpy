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
    return view('auth.login');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function (){
    Route::get('/challenges', 'ChallengeController@listAll')->name('challenges.listAll');
    Route::get('/challenges/start/{id}', 'ChallengeController@startChallenge')->name('challenges.startChallenge');
    Route::get('/challenges/complete/{id}', 'ChallengeController@completeChallenge')->name('challenges.completeChallenge');
    Route::get('/leaderboard', 'LeaderBoardController@show')->name('leaderboard.show');
    Route::get('/users/{user}', 'UsersController@view')->name('users.view');
    Route::post('/users/{user}/edit', 'UsersController@update')->name('users.update');
});
