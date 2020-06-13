<?php


namespace App\Http\Controllers;


class MainController
{
    public function index(): void
    {
        include_once RESOURCES . '/index.php';
    }
}