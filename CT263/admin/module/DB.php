<?php
/**
 * Created by PhpStorm.
 * User: trana
 * Date: 11/1/2017
 * Time: 5:45 PM
 */
//require "../lib/dbCon.php";

class db
{
    // private $host, $username, $password, $database;
	private $host = 'localhost',
            $username = 'root',
            $password = '',
            $database = 'shophtx2';
			
    public $dbc;

	/*
    public function __construct($host, $user, $pass, $database)
    {
        $this->host = $host;
        $this->username = $user;
        $this->password = $pass;
        $this->database = $database;
    }
	*/
	
    public function connect()
    {
        $conn = mysqli_connect($this->host, $this->username, $this->password, $this->database) or die('Error connecting to DB');
        //mysqli_select_db($conn, $this->database);
        mysqli_set_charset($conn,"utf8");
        $this->dbc = $conn;
    }

    public function query($sql)
    {
        $query = mysqli_query($this->dbc, $sql) or die('Error querying the Database');

        return $query;
    }

    public function fetch($sql)
    {
        $query = $this->query($sql);
        $array = mysqli_fetch_array($query, MYSQLI_ASSOC);
        return $array;
    }

    public function close()
    {
        return mysqli_close($this->dbc);
    }
}

//$db = new db($host, $user, $pass, $database);
$db = new db();
$db->connect();