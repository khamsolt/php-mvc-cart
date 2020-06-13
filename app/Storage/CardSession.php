<?php


namespace App\Storage;


use App\Storage\Contracts\CardContract;

class CardSession implements CardContract
{
    public function toArray(): array
    {
        return $_SESSION['card'] ?? [];
    }

    public function changeCount(int $id, int $value): void
    {
        array_walk($_SESSION['card'], function (&$item, $index) use ($id, $value) {
            if ($item['id'] === $id) {
                if ($value === 0) {
                    unset($_SESSION['card'][$index]);
                    return;
                }
                $item['count'] = $value;
                $item['totalPrice'] = $value * $item['price'];
                return;
            }
        });
    }

    public function deleteItem(int $id): void
    {
        array_walk($_SESSION['card'], function (&$item, $index) use ($id) {
            if ($item['id'] === $id) {
                unset($_SESSION['card'][$index]);
                return;
            }
        });
    }

    public function add(array $data, int $count): void
    {
        $cardItem = $this->createItem($data, $count);
        if (!empty($item = $this->getItem($data['id']))) {
            $this->changeCount($data['id'], $item['count']++);
        } else {
            $_SESSION['card'][] = $cardItem;
        }
    }

    public function getItem(int $id): array
    {
        foreach ($_SESSION['card'] as $item) {
            if ($item['id'] === $id) {
                return $item;
            }
        }
        return [];
    }

    private function createItem(array $data, int $count): array
    {
        return [
            'id' => $data['id'],
            'count' => $count,
            'price' => $data['price'],
            'totalPrice' => $data['price'] * $count,
        ];
    }
}