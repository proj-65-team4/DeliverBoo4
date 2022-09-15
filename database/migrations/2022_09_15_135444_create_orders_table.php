<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->decimal("subtotal",6,2);
            $table->dateTime("date_order");
            $table->dateTime("date_delivery");
            $table->string("customer_name",50);
            $table->string("customer_surname",50);
            $table->string("customer_email");
            $table->char("customer_telephone",10);
            $table->string("delivery_address",50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
