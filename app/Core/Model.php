<?php 

namespace App\Core;

use App\Core\DB;

class Model
{
    protected $table = null;
    protected $db;
    protected $conn;


    public function __construct()
    {
        $this->db   = DB::get_instance();
        $this->conn = $this->db->get_connection();
    }


    public function all()
    {

        $sth = $this->conn->prepare("SELECT * FROM " . $this->getTable() );

        $sth->execute();
        $result = $sth->fetchAll();

        return $result;

    }



    public function find( $id )
    {
        $sth = $this->conn->prepare("SELECT * FROM " . $this->getTable() . " WHERE id = $id" );

        $sth->execute();
        $result = $sth->fetchAll();

        return $result;
    }


    public function getTable()
    {
        if( $this->table != null )
        {
            return $this->table;
        }

        $cls = get_called_class();

        $cls = explode( '\\', $cls );

        return strtolower(end($cls));

    }

}