<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OrderProductSeeder extends Seeder
{
    public function run(): void
    {
        $orders = \App\Models\Order::all();
        $products = \App\Models\Product::all();

        foreach ($orders as $order) {
            $orderProducts = $products->random(3);
            foreach ($orderProducts as $product) {
                \App\Models\OrderProduct::create([
                    'order_id' => $order->order_id,
                    'product_id' => $product->product_id,
                    'quantity' => rand(1, 5),
                ]);
            }
        }
    }
}
