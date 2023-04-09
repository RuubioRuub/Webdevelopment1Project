<?php 
require __DIR__ . '/../repository/ManagementRepository.php';

class ManagementService {
    private $managementrepository;

    function __construct()
    {
        $this->managementrepository = new ManagementRepository();
    }
    public function manageGames() {
        require __DIR__ . '/../view/home/managegames.php';
    }
    public function getAdminAccounts() {
        return $this->managementrepository->getAdminAccounts();
    }
    public function addAdminAccount($account) {
        $this->managementrepository->addAdminAccount($account);
    }
}