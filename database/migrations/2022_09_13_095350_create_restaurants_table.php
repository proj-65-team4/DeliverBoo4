<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("user_id");
            $table->foreign("user_id")->references("id")->on("users");
            
            $table->string("name", 50);
            $table->string("address", 50);
            $table->string("city", 50);
            $table->string("VAT", 11);
            $table->text("image")->nullable();
            $table->string("slug");
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
        Schema::dropIfExists('restaurants');
    }
}
