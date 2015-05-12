<?php
namespace lib;

// You need to escape the namespace to the global space. Therefore \ is crucial.
use \PDO;

class Connector {
    private $connected = FALSE;
    private $error;

    public function connect() {
        // PDO MySQL.
        try {
            // If you change database engine, you only need to change this line.
            // @todo Move credentials to config.
            $conn = new PDO('mysql:host=localhost;dbname=oops;charset=utf8', 'root', 'dev');
            // Get a PDOException if any of the queries fail - No need to check explicitly.
            $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
            if ($conn) {
                $connected = TRUE;
            }
            return $conn;
        }
        // @todo
        catch (PDOException $e) {
            //@todo $this->error = $e->getMessage();
            print "Error!: Unable to connect " . $e->getMessage() . "<br/>";
            $this->error = $e->getMessage();
            die();
        }
    }

    public function disconnect() {
        $conn = null;
    }
}
