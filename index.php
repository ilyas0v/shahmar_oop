<?php 

require_once("vendor/autoload.php");


use App\Controllers\NewsController;

(new NewsController)->index();