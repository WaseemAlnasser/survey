<?php

class Router
{
    private $get = [];
    private $post = [];

    public static function make()
    {
        $router = new self;
        return $router;
    }

    public function get($uri, $action)
    {
        $this->get[$uri] = $action;

        return $this;
    }

    public function post($uri, $action)
    {
        $this->post[$uri] = $action;
        return $this;
    }

    public function resolve($uri, $method)
    {

        if (strpos($uri, 'public') === 0) {
            $this->servePublicFile($uri);
            return;
        }

        if (array_key_exists($uri, $this->$method)) {
            $action = $this->{$method}[$uri];
            $controller = new $action[0];
            $method = $action[1];
            $controller->{$method}();
        } else {
            require 'views/404.php';
        }

    }


//    private function isPublicFileRoute($uri)
//    {
//        // check if uri has public in it
//       if(strpos($uri, 'public') !== false) {
//           return true;
//       }else{
//           return false;
//       }
//    }
//
    private function servePublicFile($uri)
    {


        // Get the actual file path based on the URI
        $filePath = $uri;
        // Check if the file exists
        if (file_exists($filePath)) {

            // Determine the appropriate MIME type
            $mimeType = mime_content_type($filePath);

            // Set the appropriate headers
            header('Content-Type: ' . $mimeType);

            // Output the file content
            readfile($filePath);
        } else {
            require 'views/404.php';
        }
    }

//    private function runMiddleware($middleware)
//    {
//        // Perform any necessary actions or checks for the middleware
//        // For example, you can authenticate the user or perform authorization checks
//
//        // If the middleware logic fails, you can redirect or show an error message
//        if (!$middlewareLogicPasses) {
//            // Redirect or show error message
//        }
//    }
//
//    private function isAdminRoute($uri)
//    {
//        // Implement your logic to determine if the URI belongs to an admin route
//        // For example, you can check if the URI starts with '/admin/'
//
//        return starts_with($uri, '/admin/');
//    }
}
