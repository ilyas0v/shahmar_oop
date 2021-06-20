<?php

require_once("vendor/autoload.php");

use App\Controllers\ContactController;
use App\Controllers\NewsController;
use App\Core\Route;

Route::get( '/news', [ NewsController::class,  'index' ] ); //index.php?route=/news
Route::get( '/news/test', [ NewsController::class,  'test' ] ); //index.php?route=/news
Route::post( '/contact/send', [ ContactController::class,  'send' ] );

Route::dispatch();
