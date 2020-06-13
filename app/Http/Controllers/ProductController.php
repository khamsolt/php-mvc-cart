<?php


namespace App\Http\Controllers;


class ProductController
{
    public function index()
    {
        include_once RESOURCES . '/product-details.php';
    }
}