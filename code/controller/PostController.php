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

    $title = trim($data['title'] ?? '');
    $content = trim($data['description'] ?? '');
    $image_url = trim($data['image_url'] ?? '');
    $user_id = $_SESSION['user_id'];
    $category_id = 1;

    if (!empty($title)) {
        require_once 'model/Post.php';
        Post::insert($user_id, $category_id, $title, $content, $image_url);
        header("Location: index.php?page=home");
        exit;
    } else {
        echo "Naslov projekta je obvezen.";
    }
}
}
