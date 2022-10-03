<?php

use App\Order;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class OrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = config('DataOrders');


        foreach ($data as $order) {
            $newOrder = new Order();

            $newOrder->subtotal = $order['subtotal'];
            $newOrder->date_order = Carbon::now();
            $newOrder->date_delivery = Carbon::now()->addMinute(rand(15,50));
            $newOrder->customer_name = $order['customer_name'];
            $newOrder->customer_surname = $order['customer_surname'];
            $newOrder->customer_email = $order['customer_email'];
            $newOrder->customer_telephone = $order['customer_telephone'];
            $newOrder->delivery_address = $order['delivery_address'];

            $newOrder->save();
        }
    }
}
