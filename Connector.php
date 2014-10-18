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
            $connection = new PDO('mysql:host=localhost;dbname=oops', "root", "dev");
            echo 'Connected to database<br />';
            return $connection;
        }
        catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function disconnect() {
        $connection = null;
    }
}