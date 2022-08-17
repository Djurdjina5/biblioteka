<?php

class User{
    public $username;
    public $password;
    public $firstname;
    public $lastname;
    public $type;

    public function __construct($username=null,$password=null,$firstname=null,$lastname=null,$type=null)
    {
        $this->username = $username;
        $this->password = $password;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->type = $type;
    }

    public static function logInUser($usr, mysqli $conn)
    {
        $query = "SELECT * FROM users WHERE username='$usr->username' and password='$usr->password'";
        return $conn->query($query);
    }
}
