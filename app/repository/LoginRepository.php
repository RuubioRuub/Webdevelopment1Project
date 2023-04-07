<?php
require __DIR__ . '/Repository.php';
require __DIR__ . '/../model/user.php';

class LoginRepository extends Repository
{

    public function getUserByUsername($username)
    {
        try {
            $stmt = $this->connection->prepare('SELECT *, role.role FROM user 
                                                JOIN role ON user.role = role.id
                                                WHERE username = :username');
            $stmt->bindValue(':username', $username);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'user');
            $users = $stmt->fetchAll();

            if (is_null($users) || empty($users))
                return null;

            return $users[0];
        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function getUserByEmail($email)
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM user WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'user');
            $users = $stmt->fetchAll();

            if (is_null($users) || empty($users))
                return null;

            return $users[0];
        } catch (PDOException $e) {
            echo $e;
        }
    }
    public function register($username, $password, $email, $criticacount, $company)
    {
        try {
            $query = "INSERT INTO `user`(`username`, `password`, `email`, `role`, `criticacount`, `company`) 
                                VALUES (:username,:password,:email,:role,:criticacount,:company)";
            $stmt = $this->connection->prepare($query);
            $stmt->bindValue(':username', $username);
            $stmt->bindValue(':password', $password);
            if ($criticacount)
                $stmt->bindValue(':criticacount', 1);
            else
                $stmt->bindValue(':criticacount', 0);

            $stmt->bindValue(':email', $email);
            $stmt->bindValue(':role', 1);
            $stmt->bindValue(':company', $company);

            $stmt->execute();
        } catch (PDOException $e) {
            echo $e;
        }
    }
}
