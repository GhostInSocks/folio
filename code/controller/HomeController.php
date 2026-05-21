<?php
require_once 'model/Post.php';

class HomeController {
    public static function index() {
        $posts = Post::getAll();
        require_once 'view/home.php';
    }
}
