
<?php

    function public_path($path)
    {
        return  'public/'.$path;
    }

   function url($path){
        return 'http://localhost/php'.$path;
   }

   function user(){
       return $_SESSION['user'];
   }

   function user_check(){
       return isset($_SESSION['user']);
   }

