<?php
session_start();

require_once 'controller/HomeController.php';
require_once 'controller/PortfolioController.php';
require_once 'controller/PostController.php';
require_once 'controller/AuthController.php';

$page = isset($_GET['page']) ? $_GET['page'] : 'home';

switch ($page) {
    case 'home':
        HomeController::index();
        break;
    case 'portfolio':
        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        PortfolioController::show($id);
        break;
    case 'create':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            PostController::store($_POST);
        } else {
            PostController::showCreateForm();
        }
        break;
    case 'register':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            AuthController::register($_POST);
        } else {
            AuthController::showRegisterForm();
        }
        break;
    case 'login':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            AuthController::login($_POST);
        } else {
            AuthController::showLoginForm();
        }
        break;
    case 'logout':
        AuthController::logout();
        break;
    default:
        echo "404 - Stran ne obstaja.";
        break;
}
