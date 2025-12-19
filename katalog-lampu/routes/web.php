<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::group(['middleware' => ['guest']], function () {
    // User / Visitor
    Route::get('/login', 'AuthController@login')->name('login');
    Route::post('/ceklogin', 'AuthController@ceklogin');
    Route::get('/', 'VisitorController@searchlamp');
    Route::get('/actsearchlamp', 'VisitorController@actsearchlamp');
});

Route::group(['middleware' => ['auth']], function (){
    // Admin - Lampu
    Route::get('/home', 'PageController@home');
    Route::get('/lamp', 'PageController@lamp');
    Route::get('/lamp/lampaddform','PageController@lampaddform');
    Route::post('/lamp/lampsave', 'PageController@lampsave');
    Route::get('/lamp/editform/{id}', 'PageController@lampeditform');
    Route::put('/lamp/lampupdate/{id}', 'PageController@lampupdate');
    Route::get('/lamp/delete/{id}', 'PageController@lampdelete');
    
    // Admin - Users
    Route::get('/users', 'PageController@users');
    Route::get('/users/useraddform','PageController@usersaddform');
    
    // Perbaikan: Diganti jadi /users/save (biar umum)
    Route::post('/users/save','PageController@userssave'); 
    
    Route::get('/users/delete/{id}', 'PageController@usersdelete');

    // Admin - Reset Password User Lain
    Route::get('/users/editform/{id}', 'PageController@userseditform');
    Route::put('/users/update/{id}', 'PageController@usersupdate');

    // User - Ganti Password Sendiri & Logout
    Route::get('/logout', 'AuthController@logout');
    Route::get('/changepass', 'PageController@changepass');
    Route::post('/users/password/update', 'PageController@updatePassword');
});