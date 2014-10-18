<?php
/**
 * Created by PhpStorm.
 * User: jazio
 * Date: 18.10.14
 * Time: 08:36
 */

class Connector {
    public function connect() {
        return new PDO ("mysql:host=localhost; dbname:oops","root","dev");
        
    }

} 