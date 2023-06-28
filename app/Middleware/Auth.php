<?php

class Auth
{
    public function handle($next)
    {

        if (!user_check()) {
            header('Location: ' . '/login');
            exit;
        }

        // Call the next middleware or route handler
        return $next();
    }
}