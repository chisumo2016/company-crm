<?php
declare(strict_types=1);


use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    dd(request()->root());
    //return view('welcome');
});
