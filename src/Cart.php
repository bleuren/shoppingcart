<?php
namespace Bleuren\Shoppingcart;

session_start();

class Cart
{
    public function __construct()
    {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }
    }

    // 回傳購物車內容 (商品內容、商品總數量)
    public function content()
    {
        return $_SESSION['cart'];
    }

    // 增加商品
    public function add($product, $qty = 1)
    {
        if (isset($_SESSION['cart'][$product['id']])) {
            $_SESSION['cart'][$product['id']]['qty'] += $qty;
        } else {
            $_SESSION['cart'][$product['id']]['product'] = $product;
            $_SESSION['cart'][$product['id']]['qty'] = $qty;
        }

        $_SESSION['cart'][$product['id']]['subtotal'] = $product['price'] * $_SESSION['cart'][$product['id']]['qty'];

        return $_SESSION['cart'];
    }

    // 計算總價
    public function total()
    {  
        return array_sum(array_column($_SESSION['cart'], 'subtotal'));
    }

    // 清空購物車
    public function destroy()
    {
        session_destroy();
    }
}

