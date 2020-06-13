<?php


namespace App\Http\Controllers;


class ProductController
{
    public function index(): void
    {
        include_once RESOURCES . '/product-details.php';
    }
}