<?php

Route::get('/', array(
    'as' => 'index',
    'uses' => 'BaseFrameWorkController@index'
));
Route::post('Register',array(
    'as'=>'Register',
    'uses'=>'BaseFrameWorkController@Register'
));
