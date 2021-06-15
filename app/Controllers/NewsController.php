<?php 

namespace App\Controllers;

use App\Core\DB;
use App\Core\Model;
use App\Models\News;

class NewsController
{

    public function index()
    {
        $news = (new News)->all();

        var_dump( $news );
    }

}