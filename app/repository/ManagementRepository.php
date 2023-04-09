<?php
require __DIR__ . '/Repository.php';
require __DIR__ . '/../model/game.php';
require __DIR__ . '/../model/user.php';

class ManagementRepository extends Repository
{
    public function getAllGames()
    {
        $stmt = $this->connection->prepare("SELECT * FROM game");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'game');
        $result = $stmt->fetchAll();
        return $result;
    }
    public function getAdminAccounts()
    {
        $stmt = $this->connection->prepare("SELECT user.userID, user.username, user.password, user.email, role.role, user.criticaccount, user.company 
                                            FROM user 
                                            JOIN role ON user.role = role.id 
                                            WHERE role.role = 'Admin'");
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_CLASS, 'user');
        $users = $stmt->fetchAll();

        if (!$users || empty($users))
            return null;

        return $users;
    }
    public function addAdminAccount($account)
    {
        try {
        $stmt = $this->connection->prepare("INSERT INTO `user`(`username`, `password`, `email`, `role`, `criticaccount`, 
                                        `company`) VALUES (:username,:password,:email,:role,:criticaccount,:company)");
           
            $stmt->bindValue(':username', $account->getUsername());
            $stmt->bindValue(':password', $account->getPassword());
            $stmt->bindValue(':criticaccount', 0);
            $stmt->bindValue(':email', $account->getEmail());
            $stmt->bindValue(':role', 2);
            $stmt->bindValue(':company', $account->getCompany());

            $stmt->execute();
        } catch (PDOException $e) {
            echo $e;
        }                             
    }
}
