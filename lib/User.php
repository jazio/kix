<?php
namespace lib;

use \lib\Connector;


class User {
    // private - cannot be accessed directly, it needs a getter.
    // @todo make use of magic methods to manages exceptional situations
    const MINCHARS = 2;
    public  $username;
    private $email;
    private $password;
    private $db;
    /**
     * @param array $args
     * This is called upon object creation. Constructor is called with optional arguments.
     */
    public function __construct(Connector $db, Array $args = array()) {
           //Dependency injection. Object instantiation moved outside this class.
        $this->db = $db->connect();
        // Optional.
        $this->args = $args;
    }

    /**
     * @return mixed
     */
    public function getUsername() {
        return $this->username;
    }

    /**
     * @param $username
     * @return mixed
     */
    public function setUsername($username) {
        return $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * @param $email
     * @return mixed
     */
    public function setEmail($email) {
        return $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPassword() {
        if (!empty($this->password)) {
            return $this->password;
        }
    }

    /**
     * @param $password
     * @throws Exception
     */
    public function setPassword($password) {
        //@todo Move to Validation or Utils class.
        if (strlen($password) > self::MINCHARS) {
            // You need a varchar(64) in database
            return hash('sha256', $password);
        } else {
            throw new \Exception('Error Password of' . self::MINCHARS . 'too short', 1);
        }

    }

    public function login($username, $password) {
            $password = $this->setPassword($password);

            $sql = "SELECT username, password FROM users WHERE username=:username and password=:password LIMIT 1" ;
            $q = $this->db->prepare($sql);
            $q->bindParam(':username', $username);
            $q->bindParam(':password', $password);
            $q->execute();

        return $q->rowCount();
    }

    public function logout() {
        session_destroy();
        header('index.php');
    }

    public function register($username, $email, $password) {
        $password = $this->setPassword($password);

        $sql = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
        $q = $this->db->prepare($sql);
        $q->bindParam(':username', $username);
        $q->bindParam(':email', $email);
        $q->bindParam(':password', $password);
        $q->execute();
        $q->rowCount();
        //$row = $q->fetchAll();
        return $q->rowCount();
    }

    public function checkUserExists($username) {
        $sql = "SELECT username FROM users WHERE username=:username LIMIT 1" ;
        $q = $this->db->prepare($sql);
        $q->bindParam(':username', $username);
        $q->execute();
        if ($q->rowCount() >= 1) {
            return TRUE;
        } else {
            return FALSE;
        }

    }

    public function getUserList() {
        foreach ($this->db->query('SELECT * from users') as $row) {
            print_r($row);
        }

    }
}
