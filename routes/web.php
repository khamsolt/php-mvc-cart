<?php
return [
    '/' => 'Main@index',
    '/product' => 'Product@index',
    '/card' => 'Card@index',
    '@post:/card' => 'Card@add',
    '@post:/card/quantity' => 'Card@quantity',
    '@post:/card/delete' => 'Card@delete'
];
