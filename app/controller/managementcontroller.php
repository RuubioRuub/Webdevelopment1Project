<?php
require __DIR__ . '/../service/managementservice.php';

class ManagementController {
    private $managementservice;

    function __construct()
    {
        $this->managementservice = new ManagementService();
        session_start();
    }
    public function manageGames() {
        require __DIR__ . '/../view/management/managegames.php';
    }
    public function manageAdminAccounts() {
        $users = $this->managementservice->getAdminAccounts();
        require __DIR__ . '/../view/management/manageadminaccounts.php';
    }
}