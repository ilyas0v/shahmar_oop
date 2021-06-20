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

        echo json_encode($news);
    }


    public function test( $request )
    {
        printf( 'SALAM, %s %s', $request->ad, $request->soyad);
    }


}