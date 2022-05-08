## 得寬科技線上技術測驗

請設計一個購物車物件，這個物件可以增加商品、計算總價、回傳商品總數量。除了購物車物件外，若有需要其他相依套件，可以使用 Composer 安裝。(加分項目：若是可以的話，請把這個物件設計成能以 PSR-4 載入的套件。)

## 安裝

```
composer require bleuren/shoppingcart
```

## 使用說明

### Cart::content()

取得購物車內容，包含商品內容(編號、商品名稱、價格)

### Cart::add()

新增商品至購物車

### Cart::total()

計算購物車總額

### Cart::destroy()

清空購物車

## 範例

```
<?php

require __DIR__ . '/vendor/autoload.php';

use Bleuren\Shoppingcart\Cart;

$cart = new Cart;

$product1 = ['id' => 'A001', 'name' => '商品1', 'price' => 50];
$product2 = ['id' => 'A002', 'name' => '商品2', 'price' => 100];

$cart->add($product1, 5);
$cart->add($product2, 20);

foreach ($cart->content() as $item) {
    echo "{$item['product']['id']}{$item['product']['name']} (\${$item['product']['price']}) 共有 {$item['qty']} 個，小計 \${$item['subtotal']}。 </br>";
}
echo "總價共: \${$cart->total()}";

```