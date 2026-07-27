<?php

class Router
{
    private array $routes = [];

    /**
     * Ajouter une route
     */
    public function get(string $uri, callable|array $action): void
    {
        $this->routes['GET'][$uri] = $action;
    }

    /**
     * Exécuter une route
     */
    public function dispatch(string $uri, string $method): void
    {
        if (!isset($this->routes[$method][$uri])) {
            http_response_code(404);
            exit('404 - Page introuvable');
        }

        $action = $this->routes[$method][$uri];

        if (is_callable($action)) {
            call_user_func($action);
            return;
        }

        if (is_array($action)) {
            [$controller, $function] = $action;

            $instance = new $controller();

            $instance->$function();
        }
    }
}