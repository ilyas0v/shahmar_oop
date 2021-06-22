<?php 

namespace App\Controllers;

use App\Core\Controller;
use App\Core\DB;
use App\Core\Model;
use App\Models\News;

class NewsController extends Controller
{

    public function index()
    {
        $news = News::all();

        //echo json_encode($news);

        $this->view('news/index', compact( 'news' ) ); // [news: $news]
    }


    public function test( $request )
    {
        printf( 'SALAM, %s %s', $request->ad, $request->soyad);
    }


}