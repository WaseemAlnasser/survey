
<?php

    function public_path($path)
    {
        // get the base url
        $base_url = $_SERVER['HTTP_HOST'];
        return 'http://'. $base_url. '/public/'.$path;
    }

   function url($path){
        return 'alnasserwaseem.site'.$path;
   }

   function user(){
       return $_SESSION['user'];
   }

   function user_check(){
       return isset($_SESSION['user']);
   }

   function is_admin(){
       return user_check() && user()->admin;
   }

   function adminMiddleware($next){
       if(!is_admin()){
           header('Location: ' . '/login');
           exit;
       }
       return $next();
   }

   function isAuthMiddleware($next){
       if(user_check()){
           header('Location: ' . '/');
           exit;
       }
       return $next();
   }

   function authMiddleware($next){
        if(!user_check()){
           header('Location: ' . '/login');
       }
        return $next();
   }

   function redirect($path){
        header('Location: ' . $path);
       exit;
   }



