<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("user_id");
            $table->foreign("user_id")->references("id")->on("users");

            $table->string("name", 50);
            $table->text("description");
            $table->float("price", 6, 2);
            $table->boolean("visible")->default(1);
            $table->boolean("available")->default(1);

            $table->unsignedBigInteger("product_course_id");
            $table->foreign("product_course_id")->references("id")->on("product_courses");

            $table->text("img_thumb")->nullable();
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
        Schema::dropIfExists('products');
    }
}
