<?php

class Router
{
    protected $router = [
        'GET' => [],
        'POST' => [],
    ];

    public function get($path, $handler)
    {
        $this->router['GET'][$this->format_router($path)] = $handler;
    }

    public function post($path, $handler)
    {
        $this->router['POST'][$this->format_router($path)] = $handler;
    }

    public function dispatch()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $request_uri = $this->format_router(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)); // ignore query string

        $match = $this->match($method, $request_uri);
        if ($match) {
            list($controller, $action) = explode('@', $match['handler']);
            $params = $match['params'];

            $this->callAction($controller, $action, $params);
        } else {
            // fallback for 404
            http_response_code(404);
            echo "404 Not Found";
        }
    }

    protected function match($method, $request_uri)
    {
        foreach ($this->router[$method] as $route => $handler) {
            $pattern = preg_replace('/\{[a-zA-Z0-9_]+\}/', '([a-zA-Z0-9_]+)', $route);
            if (preg_match('#^' . $pattern . '$#', $request_uri, $matches)) {
                array_shift($matches);
                return [
                    'handler' => $handler,
                    'params' => $matches,
                ];
            }
        }
        return false;
    }

    protected function callAction($controller, $action, $params = [])
    {
        $controllerFile = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR . $controller . '.php';

        if (!file_exists($controllerFile)) {
            http_response_code(500);
            echo "Controller file '$controllerFile' not found.";
            exit;
        }

        require_once $controllerFile;

        if (!class_exists($controller)) {
            http_response_code(500);
            echo "Controller class '$controller' not found.";
            exit;
        }

        $controller_instance = new $controller();

        if (!method_exists($controller_instance, $action)) {
            http_response_code(500);
            echo "Method '$action' not found in controller '$controller'.";
            exit;
        }

        call_user_func_array([$controller_instance, $action], $params);
    }


    protected function format_router($router)
    {
        return '/' . trim($router, '/');
    }
}
