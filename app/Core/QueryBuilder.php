<?php 

namespace App\Core;

use App\Core\DB;

class QueryBuilder
{
    protected static $table = null;
    protected $db;
    protected $conn;
    protected $model;


    public function __construct( $model )
    {
        $this->model = $model;
    }


    public function all()
    {
        $arr = [];

        $result = DB::fetchAll( self::getTable() );

        foreach( $result as $r )
        {
            $arr[] = (object) $r;
        } 

        return $arr;
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