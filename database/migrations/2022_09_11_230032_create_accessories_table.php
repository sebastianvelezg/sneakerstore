<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('accessories', function (Blueprint $table) {
            $table->id();
            $table->string("type");
            $table->string("brand");
            $table->string("description");
            $table->string("material");
            $table->float("price");
            $table->unsignedBigInteger('id_category');
            $table->foreign('id_category')->references('id')->on('categories');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('accessories');
    }
};
