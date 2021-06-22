<?php 

namespace App\Core;

use App\Core\DB;

class Model extends QueryBuilder
{
    protected static $table = null;
    protected $db;
    protected $conn;


    public static function __callStatic($name, $arguments)
	{
		$m = new QueryBuilder( static::class );

		if( method_exists( $m, $name ) )
		{
			return call_user_func_array( [$m, $name], $arguments );
		}

	}


}