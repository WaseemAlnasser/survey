<?php


require_once 'app/Models/User.php';
require_once 'app/Models/Survey.php';
require_once 'app/Models/Question.php';


class AppController {

    public function home() {
        $surveys = Survey::where('featured', 1)->get();
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
            return;
        } else {
           $message = "Invalid credentials";
           $_SESSION['msg'] = ["type" => "danger", "message" => $message ];
            header("Location: " . '/login');
          return;
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
           $message = "Invalid email";
           $_SESSION['msg'] = ["type" => "danger", "message" => $message ];
              header("Location: " . '/register');
            return;

        }

        if (empty($email)) {
           $message = "Email is required";
           $_SESSION['msg'] = ["type" => "danger", "message" => $message ];
              header("Location: " . '/register');
            return;

        }

        if (empty($password)) {
              $message = "Password is required";
              $_SESSION['msg'] = ["type" => "danger", "message" => $message ];
                  header("Location: " . '/register');
                  return;
        }

        if ($password != $password_confirm) {
                $message = "Passwords do not match";
                $_SESSION['msg'] = ["type" => "danger", "message" => $message ];
                header("Location: " . '/register');
                 return;

        }

        // check if email exists

        $user = User::where('email', $email)->first();
        if ($user != null) {
            $message = "Email already exists";
            $_SESSION['msg'] = ["type" => "danger", "message" => $message ];
            header("Location: " . '/register');
            return;

        }

        $user = new User();
        $user->name = $_POST['name'];
        $user->email = $email;
        $user->password = $password;
        $user->save();

        $_SESSION['user'] = $user;
        header("Location: " . '/');
    }

    public function surveys()
    {
        $surveys = Survey::all();
        require "views/surveys.php";
    }

    public function account()
    {
        authMiddleware(function (){
            $user = User::find($_SESSION['user']->id);
            require "views/account.php";
        });
    }

    public function account_edit()
    {
        authMiddleware(function (){
            $user = User::find($_SESSION['user']->id);
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $password_confirm = $_POST['password_confirmation'];

            // validate email
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $message = "Invalid email format";
                $_SESSION['msg'] = ["type" => "danger", "message" => $message];
                header("Location: " . '/account');
                return;
            }

            if (empty($email)) {
                $message = "Email is required";
                $_SESSION['msg'] = ["type" => "danger", "message" => $message];
                header("Location: " . '/account');
                return;
            }


            if (!empty($password) ) {
                if ($password != $password_confirm){
                    $message = "Password and password confirmation do not match";
                    $_SESSION['msg'] = ["type" => "danger", "message" => $message];
                    header("Location: " . '/account');
                    return;
                }

            }

            $user->name = $name;
            $user->email = $email;
            if (!empty($password)) {
                $user->password = $password;
            }
            $user->save();

            if ($_SESSION['user']->id == $id) {
                $_SESSION['user'] = $user;
            }
            $message = "data updated successfully";
            $_SESSION['msg'] = ["type" => "success", "message" => $message];
            header("Location: " . '/account');
        });
    }

    public function admin()
    {
        adminMiddleware(function (){
            $survey_count = Survey::count();
            $user_count = User::count();
            // get the submissions count from the survey table from the submit_count column
            $survey_submissions_count = Survey::select('submit_count')->sum('submit_count');
            $recent_users = User::orderBy('created_at', 'desc')->take(5)->get();
            $recent_surveys = Survey::orderBy('created_at', 'desc')->select('id','title','featured', 'created_at')->take(5)->get();
            // get $recent_submissions by using the Answer model but get only one row per survey and user combination
            $recent_submissions   = Answer::select('survey_id', 'user_id', 'created_at')->groupBy('survey_id', 'user_id')->orderBy('created_at', 'desc')->take(5)->get();
            require "views/admin/index.php";
        });
    }
}


