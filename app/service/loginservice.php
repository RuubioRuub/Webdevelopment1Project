<?php
require __DIR__ . '/../repository/LoginRepository.php';

class LoginService
{
    private $loginrepository;

    function __construct()
    {
        $this->loginrepository = new LoginRepository();
    }

    public function getUserByUsername($username) {
        return $this->loginrepository->getUserByUsername($username);
    }

    public function getUserByEmail($email){
        return $this->loginrepository->getUserByEmail($email);
    }
    public function register($username, $password, $email, $criticacount, $company) {
        $this->loginrepository->register($username, $password, $email, $criticacount, $company);
    }
}
