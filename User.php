<?php

class User
{
  // private - cannot be accessed directly, it needs a getter.
  private $email;
  private $password;
  const MINCHARS = 8;

  public function getEmail()
  {
    return $this->email;
  }

  public function setEmail($email)
  {
    return $this->email = $email;
  }

  public function getPassword()
  {
    return $this->password;
  }

  public function setPassword($password)
  {

    if (strlen($password) < 1) {
      throw new Exception('Error Password of' . self::MINCHARS . 'too short', 1);
    }
    return $this->password = $password;

  }

  public function login()
  {
    return "User login.";
  }

  public function logout()
  {
    return "User logout.";
  }

}