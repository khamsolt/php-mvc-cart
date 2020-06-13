<?php


namespace App\Http\Controllers;


use App\Repositories\ProductRepository;
use App\Services\CardService;
use App\Services\Contracts\CardContract as CardServiceContract;
use App\Storage\CardSession;
use Exception;

class CardController
{
    private CardServiceContract $service;

    public function __construct()
    {
        $this->service = new CardService(new CardSession(), new ProductRepository());
    }

    public function index(): void
    {
        $data = $this->service->getCard();
        include_once RESOURCES . '/card.php';
    }

    public function add(): void
    {
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        $count = filter_input(INPUT_POST, 'quantity', FILTER_VALIDATE_INT);
        if (empty($id) || empty($count)) {
            throw new Exception('Not Found 404');
        }
        $this->service->add($id, $count);
        header("Location: http://khamsolt.net/card");
    }

    public function quantity(): void
    {
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        $quantity = filter_input(INPUT_POST, 'quantity', FILTER_VALIDATE_INT);
        if (empty($id) || !is_int($quantity)) {
            throw new Exception('Not Found 404');
        }
        $this->service->changeQuantity($id, $quantity);
        $data = $this->service->getCard();
        include_once RESOURCES . '/card-table.php';
    }

    public function delete(): void
    {
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        $this->service->delete($id);
        $data = $this->service->getCard();
        include_once RESOURCES . '/card-table.php';
    }
}