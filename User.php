<?php
include_once('Connector.php');
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
        // Dependency injection.
        $this->db = $db->connect();
        // Optional.
        $this->args = $args;
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
    public function getUsername() {
        return $this->username;
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

        if (strlen($password) > self::MINCHARS) {
            return $this->password = hash('sha256', $password, true);
        } else {
            throw new Exception('Error Password of' . self::MINCHARS . 'too short', 1);
        }

    }

    public function login($username, $password) {
        if (!empty($username) && !empty($password)) {
            return "User login.";
        }
        return "Login failed.";
    }

    public function logout() {
        return "User logout.";
    }

    public function register($username, $email, $password) {
        // @todo abstract the database layer
        // @todo clear the persistent connection
        $sql = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
        $statement = $this->db->prepare($sql);
        $statement->execute(array(':username' => $username, ':email' => $email, ':password' => $password ));

        if($statement) {
            print "Dear {$username} welcome to the system";
        };

    }

    public function getUserList() {
        foreach ($this->db->query('SELECT * from oops_users') as $row) {
            print_r($row);
        }

    }
}