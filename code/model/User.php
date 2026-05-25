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

    public static function getUserPosts($user_id) {
          $db = DBInit::getInstance();
          
          $stmt = $db->prepare("
              SELECT cards.*, users.username, categories.name AS category_name
              FROM cards
              JOIN users ON cards.user_id = users.id
              JOIN categories ON cards.category_id = categories.id
              WHERE cards.user_id = :user_id
              ORDER BY cards.id DESC
          ");

          $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
          $stmt->execute();

          return $stmt->fetchAll(PDO::FETCH_ASSOC);
      }
}
?>
