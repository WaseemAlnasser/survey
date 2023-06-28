<?php


require_once 'app/Models/User.php';


class AppController {

    public function home() {
        require "views/index.php";
    }

    public function logout()
    {
        session_destroy();
        header("Location: " .'/');
    }

    public function login() {
        isAuthMiddleware(function (){
            require "views/login.php";
        });
    }

    public function login_post()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $user = User::where('email', $email)->first();
        if ($user && $password == $user->password) {
            $_SESSION['user'] = $user;
            header("Location: " . '/');
        } else {
            echo "Invalid credentials";
        }

    }

    public function register() {
        isAuthMiddleware(function (){
            require "views/register.php";
        });


    }

    public function register_post()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password_confirm = $_POST['password_confirmation'];

        // validate email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Invalid email format";
            return;
        }

        if (empty($email)) {
            echo "Email is required";
            return;
        }

        if (empty($password)) {
            echo "Password is required";
            return;
        }

        if ($password != $password_confirm) {
            echo "Passwords do not match";
            return;
        }

        // check if email exists

        $user = User::where('email', $email)->first();
        if ($user != null) {
            echo "Email already exists";
            return;
        }

        $user = new User();
        $user->name = $_POST['name'];
        $user->email = $email;
        $user->password = $password;
        $user->save();

        header("Location: " . 'login');
    }

    public function admin()
    {
        adminMiddleware(function (){
            require "views/admin/index.php";
        });
    }
}


