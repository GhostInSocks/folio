<?php
require_once 'model/Post.php';

class PostController {
    public static function showCreateForm() {
        require_once 'view/create.php';
    }

    public static function store($data) {
        $category_id = isset($data['category_id']) ? $data['category_id'] : 1;
        $title = isset($data['title']) ? $data['title'] : 'Brez naslova';
        $content = isset($data['content']) ? $data['content'] : '';

        Post::insert(1, $category_id, $title, $content);

        header("Location: index.php?page=home");
        exit;
    }
}
