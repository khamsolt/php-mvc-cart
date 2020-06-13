<?php


namespace App\Repositories;


use App\Repositories\Contracts\ProductContract;

class ProductRepository implements ProductContract
{
    private array $data;

    public function __construct()
    {
        $this->data = require STORAGE . '/products.php';
    }

    public function all(): array
    {
        return $this->data;
    }

    public function findWhereId(int $id): array
    {
        return array_values((array_filter($this->data, function ($item) use ($id) {
            return $item['id'] === $id;
        })))[0] ?? [];
    }
}