<?php


namespace App\Services\Contracts;


interface CardContract
{
    public function getCard(): array;

    public function changeQuantity(int $productId, int $quantity): void;

    public function delete(int $productId): void;

    public function add(int $productId, int $count): void;
}