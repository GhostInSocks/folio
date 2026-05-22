<?php
require_once 'model/DBInit.php';

class Post {
      public static function getAll() {
        $db = DBInit::getInstance();
        $stmt = $db->prepare("
            SELECT cards.*, users.username
            FROM cards
            JOIN users ON cards.user_id = users.id
            ORDER BY cards.id DESC
        ");

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getById($id) {
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT * FROM cards WHERE id = :id");
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetch();
    }

    public static function insert($user_id, $category_id, $title, $content, $image_url) {
        $db = DBInit::getInstance();

        $statement = $db->prepare("
            INSERT INTO cards (user_id, category_id, title, content, image_url)
            VALUES (:user_id, :category_id, :title, :content, :image_url)
        ");

        $statement->bindParam(':user_id', $user_id);
        $statement->bindParam(':category_id', $category_id);
        $statement->bindParam(':title', $title);
        $statement->bindParam(':content', $content);
        $statement->bindParam(':image_url', $image_url);

        $statement->execute();
    }

    public static function update($id, $title, $content, $image_url) {
        $db = DBInit::getInstance();

        $statement = $db->prepare("
            UPDATE cards
            SET title = :title, content = :content, image_url = :image_url
            WHERE id = :id
        ");

        $statement->bindParam(':title', $title);
        $statement->bindParam(':content', $content);
        $statement->bindParam(':image_url', $image_url);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);

        $statement->execute();
    }

    public static function delete($id) {
        $db = DBInit::getInstance();
        $statement = $db->prepare("DELETE FROM cards WHERE id = :id");
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
    }
}
