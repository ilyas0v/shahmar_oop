<?php 

namespace App\Core;

class Controller
{
    
    public function view( $path, $data )
    {
        $file_path = realpath('.') . '/app/Views/' . $path . '.php';

        if( !file_exists( $file_path ) )
        {
            exit( $file_path . " not found!");
        }

        extract($data);

        require( $file_path );
    }


}