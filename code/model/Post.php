<?php
require_once 'model/DBInit.php';

class Post {
    public static function getAll() {
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT * FROM cards");
        $statement->execute();
        return $statement->fetchAll();
    }

    public static function getById($id) {
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT * FROM cards WHERE id = :id");
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetch();
    }

    public static function insert($user_id, $category_id, $title, $content) {
        $db = DBInit::getInstance();

        $statement = $db->prepare("INSERT INTO cards (user_id, category_id, title, content)
                                   VALUES (:user_id, :category_id, :title, :content)");

        $statement->bindParam(':user_id', $user_id);
        $statement->bindParam(':category_id', $category_id);
        $statement->bindParam(':title', $title);
        $statement->bindParam(':content', $content);

        $statement->execute();
    }
}
