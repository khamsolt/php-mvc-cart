<?php


namespace App\Repositories\Contracts;


interface ProductContract
{
    public function all(): array;

    public function findWhereId(int $id): array;
}