<?php

/**
 * @var array $data
 */

foreach ($data as $item): ?>
    <tr data-id="<?=$item['id'] ?>">
        <td class="product-thumbnail">
            <a href="#"><img src="assets/img/basket/cart-3.jpg" alt=""></a>
        </td>
        <td class="product-name"><a href="#"><?= $item['name'] ?></a></td>
        <td class="product-price-cart"><span class="amount">$<?= $item['price'] ?></span>
        </td>
        <td class="product-quantity">
            <div class="cart-plus-minus">
                <input class="cart-plus-minus-box" type="text" name="qtybutton"
                       value="<?= $item['count'] ?>">
            </div>
        </td>
        <td class="product-subtotal">$<?= $item['totalPrice'] ?></td>
        <td class="product-remove"><a href="#"><i class="ti-trash"></i></a></td>
    </tr>
<?php endforeach; ?>