<?php 

namespace App\Core;

class Route
{

    private static $routes = [
        'GET'   => [],
        'POST'  => []
    ];


    public static function get( $route , $action )
    {

        self::$routes['GET'][ trim( $route , '/' ) ] =  $action;     //  [ 'get' =>  [ '/about' => [AboutController, index] ]  ]
    }


    public static function post( $route, $action )
    {
        self::$routes['POST'][ trim( $route , '/' ) ] =  $action;
    }


    public static function getRoutes()
    {
        return self::$routes;
    }


    public static function dispatch()
    {
        $routes = self::getRoutes(); // ['GET' => [ ...] , 'POST' => [...] ]
        
        $request_type = $_SERVER['REQUEST_METHOD']; // GET ve ya POST qaytaracaq
        
        $routes = $routes[ $request_type ] ?? []; // $routes icindeki GET ve ya POST arrayini qaytarir(yuxari bax)

        $route_path = trim( $_REQUEST['route'], '/' ); // URL-den  ?route  deyerini goturur, meselen  ?route=/news     /news qaytarir       

        $route = $routes[ $route_path ] ?? []; //  hemin  /news-u    $routes arrayinde key olaraq axtarir,  [ '/news' => [ NewsController, index ] ]

        if( count( $route ) == 0 )
        {
            header("HTTP/1.0 404 Not Found");
            die('Route not found');
        }


        $controller = $route[ 0 ];
        $action     = $route[ 1 ];

        if( !method_exists( $controller, $action ))
        {
            header("HTTP/1.0 404 Not Found");
            die( $controller . '::' . $action . ' method not found');
        }


        $request_object = (object) $_REQUEST;

        unset( $request_object->route );

        call_user_func_array( [ (new $controller), $action ], [ $request_object ]);
    }

}
