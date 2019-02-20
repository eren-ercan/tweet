<?php

class DB {

    private $conn;

    function __construct(){
        $this->conn = new mysqli('localhost', 'root', '', 'project');
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->connect_error);
        }         
    }

    function write($query){
        return mysqli_query(
            $this->conn,$query
            )or die(mysqli_error($this->conn));
    }

    function read($query):array{
        $result = array();
        $res = mysqli_query($this->conn,$query);
        while($row = $res->fetch_assoc()){
            array_push($result,$row);
        }
        return $result;
    }
}

?>