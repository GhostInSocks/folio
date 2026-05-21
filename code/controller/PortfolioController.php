<?php
require_once 'model/Post.php';

class PortfolioController {
    public static function show($id) {
        $post = Post::getById($id);
        if ($post) {
            require_once 'view/detail.php';
        } else {
            echo "Projekt ne obstaja.";
        }
    }
}
?>
