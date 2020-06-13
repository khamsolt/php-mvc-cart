<?php


namespace App\Kernel;


use App\Routing\Router;
use Exception;

class Core
{
    private Router $router;
    private string $controllerPath = '\App\Http\Controllers';

    public function __construct(array $config)
    {
        $this->router = new Router($config);
    }

    public function up(): void
    {
        $route = $this->router->createRoute();
        $controller = $this->controllerPath . '\\' . $route[0] . 'Controller';
        $action = $route[1];
        if (class_exists($controller)) {
            $instance = new $controller();
            if (method_exists($instance, $action)) {
                $instance->$action();
                exit;
            }
        }
        throw new Exception('Not Found 404');
    }
}