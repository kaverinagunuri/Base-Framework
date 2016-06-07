<?php

Route::get('/', array(
    'as' => 'index',
    'uses' => 'BaseFrameWorkController@index'
));
Route::post('Register',array(
    'as'=>'Register',
    'uses'=>'BaseFrameWorkController@Register'
));
Route::get('/verifyEmail/{ValidationToken}',array(
    'as'=>'Login',
    'uses'=>'BaseFrameWorkController@Login'
));
