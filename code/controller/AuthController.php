<?php
require_once 'model/User.php';

class AuthController {

    public static function showRegisterForm() {
        require_once 'view/register.php';
    }

    public static function showLoginForm() {
        require_once 'view/login.php';
    }

    public static function register($data) {
        $username = trim($data['username']);
        $password = trim($data['password']);

        if (empty($username) || empty($password)) {
            echo "All fields must be completed.";
            return;
        }

        $existingUser = User::getByUsername($username);
        if ($existingUser) {
            echo "The username is already taken.";
            return;
        }

        if (User::insert($username, $password)) {
            header("Location: index.php?page=login");
            exit;
        } else {
            echo "Something went wrong with the registration.";
        }
    }

    public static function login($data) {
        $username = trim($data['username']);
        $password = trim($data['password']);

        $user = User::getByUsername($username);
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];

            header("Location: index.php?page=home");
            exit;
        } else {
            echo "Incorrect username or password.";
        }
    }

    public static function logout() {
        session_unset();
        session_destroy();
        header("Location: index.php?page=home");
        exit;
    }
}
?>
