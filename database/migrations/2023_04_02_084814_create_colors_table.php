<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColorsTable extends Migration
{

    public function up()
    {
        Schema::create('colors', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->tinyInteger('ia_active')->default(0);
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('colors');
    }
}
