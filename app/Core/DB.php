<?php 

namespace App\Core;

use PDO;

class DB
{

    private static $instance = null;
    private $conn;

    public function __construct()
    {
        $this->conn = new PDO(
            "mysql:host=localhost;
            dbname=shahmar_oop", 'root' , 'root',
            [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"]
        );
    }


    public static function get_instance()
    {
        if( self::$instance == null )
        {
            self::$instance = new DB();
        }
        return self::$instance;
    }


    public function get_connection()
    {
        return $this->conn;
    }



    public static function fetchAll( $tableName )
    {
        $db = DB::get_instance();
        $conn = $db->get_connection();

        $sth = $conn->prepare("SELECT * FROM " . $tableName );

        $sth->execute();
        $result = $sth->fetchAll();

        return $result;
    }
}