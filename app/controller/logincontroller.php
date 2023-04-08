<?php
require __DIR__ . '/../service/loginservice.php';

class LoginController
{
    private $loginService;

    function __construct()
    {
        $this->loginService = new LoginService();
        session_start();
    }

    public function index()
    {
        require __DIR__ . '/../view/login/index.php';
    }
    public function authenticate()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $username = isset($_POST['username']) ? $_POST['username'] : "";
            $enteredPassword = isset($_POST['password']) ? $_POST['password'] : "";
            $user = $this->loginService->getUserByUsername($username);

            if (password_verify($enteredPassword, $user->getPassword())) {
                $_SESSION['username'] = $user->getUsername();
                $_SESSION['loggedin'] = TRUE;
                $_SESSION['role'] = ($user->getRole() == "Admin");
                if ($user->getCriticacount()) {
                    $_SESSION['company'] = $user->getCompany();
                }
                header('Location: /home');
            } else {
                echo "<script>alert('Incorrect username or password')</script>";
                header('location: /login/register');
            }
        }
    }
    public function register()
    {
        require __DIR__ . '/../view/login/register.php';
    }
    public function registerUser()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $username = $_POST['username'];

            $password = $_POST['password'];
            $hashedPass = password_hash($password, PASSWORD_DEFAULT);

            $email = $_POST['email'];
            $iscritic = false;

            if ($_POST['company'] == "")
                $company = "none";
            else {
                $iscritic = true;
                $company = $_POST['company'];
            }

            // Validate updated information
            if (empty($email) || !$this->loginService->getUserByEmail($email) == null) {
                echo "<script>alert('email already exists!')</script>";
            } else if (empty($username) || !$this->loginService->getUserByUsername($username) == null) {

                echo "<script>alert('username already exists!')</script>";
            } else if (strlen($password) < 6) {
                echo "<script>alert('Password must be at least 6 characters long.')</script>";
            } else {

                $this->loginService->register($username, $hashedPass, $email, $iscritic, $company);

                echo "<script>alert('Register successful! ')</script>";
                $this->index();
            }
        }
    }
    public function logout() {
        session_destroy(); 
        header('location: /home');
    }
}
