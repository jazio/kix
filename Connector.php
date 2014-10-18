<?php
/**
 * Connector.
 * Connection to a database.
 * @todo: make it database agnostic
 * @todo: add several engines: http://www.phpro.org/tutorials/Introduction-to-PHP-PDO.html#4
 * Date: 18.10.14
 */

class Connector {

    public function connect() {
        //PDO MySQL
        try {
            $conn = new PDO('mysql:host=localhost;dbname=oops', "root", "dev");

            if ($conn) {
                echo 'Connected to database<br />';
            }
            return $conn;
        }
        catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function disconnect() {
        $conn = null;
    }
}