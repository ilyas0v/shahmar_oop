<?php 

namespace App\Core;

use App\Core\DB;

class Model
{
    protected static $table = null;
    protected $db;
    protected $conn;


    public static function __callStatic($name, $arguments)
	{
		$m = new Model( static::class );

		if( method_exists( $m, $name ) )
		{
			return call_user_func_array( [$m, $name], $arguments );
		}

	}


    public function all()
    {
        return DB::fetchAll( self::getTable() );
    }



    public function find( $id )
    {
        $sth = $this->conn->prepare("SELECT * FROM " . $this->getTable() . " WHERE id = $id" );

        $sth->execute();
        $result = $sth->fetchAll();

        return $result;
    }


    public static function getTable()
    {
        if( self::$table != null )
        {
            return self::$table;
        }

        $cls = get_called_class();

        $cls = explode( '\\', $cls );

        return strtolower(end($cls));

    }

}