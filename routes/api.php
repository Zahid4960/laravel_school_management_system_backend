<?php

use Illuminate\Http\Request;

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });



// authentication routes
Route::post('registration', 'User\AuthenticationController@registration');
Route::post('login', 'User\AuthenticationController@login');

// password reset
Route::post('password-reset', 'User\SettingsController@passwordReset');

Route::apiResource('student-basic-infos', 'Student\StudentBasicInfoController');
