<?php
namespace lib;

// \ is crucial.
use \PDO;

class Connector {
    private $connected = FALSE;

    public function connect() {
        //PDO MySQL

        try {
            // If you change database engine, you only need to change this line.
            $conn = new PDO('mysql:host=localhost;dbname=oops;charset=utf8', 'root', 'dev');
            // Get a PDOException if any of the queries fail - No need to check explicitly.
            $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
            if ($conn) {
                $connected = TRUE;
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