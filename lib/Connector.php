<?php
namespace lib;

use \PDO;

class Connector {

    public function connect() {
        //PDO MySQL
        try {
            $conn = new PDO('mysql:host=localhost;dbname=oops;charset=utf8', 'root', 'dev');
            $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
            var_dump($conn);
            if ($conn) {
                echo 'Connected to database<br />';
            }
            return $conn;
        }
        catch (PDOException $e) {
            print "Error!: Unable to connect " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function disconnect() {
        $conn = null;
    }
}