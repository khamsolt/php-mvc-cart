<?php


namespace App\Routing;


use Exception;

class Router
{
    private string $controller = 'Main';
    private string $action = 'index';
    private string $path = '';
    private array $config = [];

    public function __construct(array $config)
    {
        $this->config = $config;
    }

    /**
     * @return array
     * array_filter(explode('/', $request), fn ($value) => !is_null($value) && $value !== '')
     */
    private function parseUrlQuery(): string
    {
        if (strpos($_SERVER['REQUEST_URI'], '?') !== false) {
            $request = strstr($_SERVER['REQUEST_URI'], '?', -1);
        } else {
            $request = $_SERVER['REQUEST_URI'];
        }
        return $request;
    }

    public function createRoute(): array
    {
        $config = $this->findCurrentRoute();
        return explode('@', $config);
    }

    private function findCurrentRoute(): string
    {
        $method = strtolower($this->getMethod());
        switch ($method) {
            case 'post':
                return $this->findPostRoute();
            case 'get':
            default:
                return $this->findGetRoute();
        }
    }

    private function findGetRoute(): string
    {
        $request = $this->parseUrlQuery();
        foreach ($this->config as $key => $value) {
            if ($key === $request) {
                return $value;
            }
        }
        throw new Exception('Not Found 404');
    }

    private function findPostRoute(): string
    {
        $request = $this->parseUrlQuery();
        foreach ($this->config as $key => $value) {
            if (substr($key, 6) === $request) {
                return $value;
            }
        }
        throw new Exception('Not Found 404');
    }

    private function getMethod(): string
    {
        return $_SERVER['REQUEST_METHOD'];
    }
}