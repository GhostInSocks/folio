<?php
require_once 'model/Post.php';

class PostController {
    public static function showCreateForm() {
      if (!isset($_SESSION['user_id'])) {
          header("Location: index.php?page=login");
          exit;
      }
      require_once 'view/create.php';
    }

    public static function store($data) {
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?page=login");
            exit;
        }
        $category_id = isset($data['category_id']) ? $data['category_id'] : 1;
        $title = isset($data['title']) ? $data['title'] : 'Brez naslova';
        $content = isset($data['content']) ? $data['content'] : '';

        Post::insert($_SESSION['user_id'], $category_id, $title, $content);

        header("Location: index.php?page=home");
        exit;
    }
}
