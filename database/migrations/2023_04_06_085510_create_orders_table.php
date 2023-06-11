<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{

    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('color_id')->nullable();
            $table->integer('qty')->nullable();
            $table->integer('price')->nullable();
            $table->integer('status')->default(0);
            $table->integer('confirm_by')->nullable();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
