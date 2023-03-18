<?php
class LoginController {
    private $loginService;

    function __construct()
    {
        $this->loginService = new LoginService();
    }

    public function index(){
        require __DIR__ . '/../view/login/index.php';
    }
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $username = isset($_POST['username']) ? $_POST['username'] : "";
            $enteredPassword = isset($_POST['password']) ? $_POST['password'] : "";
            $userPassword = $this->loginService->getPassByUsername($username);

            if (password_verify($password, $passtocompare)) {
                $_SESSION['username'] = $username;
                $_SESSION['loggedin'] = true;
                session_start();
                header('Location: /home/index');
            } else {
                $message = "Login error: Username or password incorrect.";
            }
        }
    }
}