<?php


namespace App\Services;


use App\Repositories\Contracts\ProductContract as ProductRepository;
use App\Services\Contracts\CardContract as ContractService;
use App\Storage\Contracts\CardContract as CardSession;

class CardService implements ContractService
{
    private CardSession $session;
    private ProductRepository $repository;

    public function __construct(CardSession $session, ProductRepository $repository)
    {
        $this->session = $session;
        $this->repository = $repository;
    }

    public function getCard(): array
    {
        $data = array_map(function ($item) {
            $product = $this->repository->findWhereId($item['id']);
            return array_merge($item, $product);
        }, $this->session->toArray());
        return $data;
    }

    public function changeQuantity(int $productId, int $quantity): void
    {
        $this->session->changeCount($productId, $quantity);
    }

    public function delete(int $productId): void
    {
        $this->session->deleteItem($productId);
    }

    public function add(int $productId, int $count): void
    {
        $data = $this->repository->findWhereId($productId);
        $this->session->add($data, $count);
    }
}