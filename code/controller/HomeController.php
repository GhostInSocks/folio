<?php
require_once 'model/Post.php';

class HomeController {
    public static function index() {
        $searchQuery = isset($_GET['search']) ? trim($_GET['search']) : '';

        if (!empty($searchQuery)) {
            $posts = Post::search($searchQuery);
        } else {
            $posts = Post::getAll();
        }

        require_once 'view/home.php';
    }
}
