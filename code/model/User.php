<?php
require_once 'model/DBInit.php';

class User {
    public static function getByUsername($username) {
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT * FROM users WHERE username = :username");
        $statement->bindParam(':username', $username);
        $statement->execute();
        return $statement->fetch();
    }

    public static function insert($username, $password) {
        $db = DBInit::getInstance();
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $statement = $db->prepare("INSERT INTO users (username, password, bio) VALUES (:username, :password, '')");
        $statement->bindParam(':username', $username);
        $statement->bindParam(':password', $hashedPassword);

        return $statement->execute();
    }
}
?>
