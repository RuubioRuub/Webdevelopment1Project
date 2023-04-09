<?php
require __DIR__ . '/../../service/managementservice.php';

class ManagementController
{
    private $managementservice;

    function __construct()
    {
        $this->managementservice = new ManagementService();
    }
    public function index()
    {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers: *");
        header("Access-Control-Allow-Methods: *");

        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $accounts = $this->managementservice->getAdminAccounts();
            header('Content-Type: application/json');
            echo json_encode($accounts);
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // read JSON from the request, convert it to a review object
            $body = file_get_contents('php://input');
            $object = json_decode($body);
            $newAccount = new User();
            $newAccount->setUsername(htmlspecialchars($object->username));
            $newAccount->setPassword(htmlspecialchars(password_hash($object->password, PASSWORD_DEFAULT)));
            $newAccount->setEmail(htmlspecialchars($object->email));
            $newAccount->setRole($object->role);
            $newAccount->setCriticaccount($object->criticaccount);
            $newAccount->setCompany($object->company);

            $this->managementservice->addAdminAccount($newAccount);
        }
    }
}
