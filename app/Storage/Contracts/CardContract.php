<?php


namespace App\Storage\Contracts;


interface CardContract extends StorageContract
{
    public function toArray(): array;

    public function changeCount(int $id, int $value): void;

    public function deleteItem(int $id): void;

    public function add(array $data, int $count): void;

    public function getItem(int $id): array;
}