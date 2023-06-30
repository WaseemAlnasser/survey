<?php


require_once 'app/Models/User.php';


class UserController {

    public function all()
    {
        adminMiddleware(function (){
            $users = User::all();
            require "views/admin/users/all.php";
        });
    }

    public function store()
    {
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $admin = filter_input(INPUT_POST, 'admin', FILTER_SANITIZE_NUMBER_INT) ?? 0;
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        $password_confirm = filter_input(INPUT_POST, 'password_confirmation', FILTER_SANITIZE_STRING);

        // validate email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $message = "Invalid email format";
            $_SESSION['msg'] = ["type" => "danger", "message" => $message];
            header("Location: " . '/admin/users/create');
            return;
        }

        if (empty($email)) {
            $message = "Email is required";
            $_SESSION['msg'] = ["type" => "danger", "message" => $message];
            header("Location: " . '/admin/users/create');
            return;
        }

        if (!empty($password) ) {
            if ($password != $password_confirm) {
                $message = "Password and password confirmation do not match";
                $_SESSION['msg'] = ["type" => "danger", "message" => $message];
                header("Location: " . '/admin/users/create');
                return;
            }
        }

        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->admin = $admin;
        $user->password = $password;
        $user->save();

        $message = "User created successfully";
        $_SESSION['message'] = ["type" => "success", "message" => $message];
        header("Location: " . '/admin/users/all');

    }

    public function edit()
    {
        adminMiddleware(function (){
            $id = $_GET['id'];
            $user = User::find($id);
            if (!$user) {
                require 'views/404.php';
                return;
            }
            require "views/admin/users/edit.php";
        });
    }

    public function update()
    {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $admin = $_POST['admin'] ?? 0;
        $password = $_POST['password'];
        $password_confirm = $_POST['password_confirmation'];

        // validate email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $message = "Invalid email format";
            $_SESSION['msg'] = ["type" => "danger", "message" => $message];
            header("Location: " . '/admin/user/edit?id=' . $id);
            return;
        }

        if (empty($email)) {
            $message = "Email is required";
            $_SESSION['msg'] = ["type" => "danger", "message" => $message];
            header("Location: " . '/admin/user/edit?id=' . $id);
            return;
        }


        if (!empty($password) ) {
            if ($password != $password_confirm){
                $message = "Password and password confirmation do not match";
                $_SESSION['msg'] = ["type" => "danger", "message" => $message];
                header("Location: " . '/admin/user/edit?id=' . $id);
                return;
            }

        }

        $user = User::find($id);
        $user->name = $name;
        $user->email = $email;
        $user->admin = $admin;
        if (!empty($password)) {
            $user->password = $password;
        }
        $user->save();

        if ($_SESSION['user']->id == $id) {
            $_SESSION['user'] = $user;
        }
        $message = "User updated successfully";
        $_SESSION['msg'] = ["type" => "success", "message" => $message];
        header("Location: " . '/admin/users/all');
    }

    public function create()
    {
        adminMiddleware(function () {
            require "views/admin/users/new.php";
        });
    }
}


