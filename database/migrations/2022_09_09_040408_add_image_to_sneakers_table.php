<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('sneakers', function (Blueprint $table) {
            $table->string('image')->default('no-image.png');
        });
    }

    public function down()
    {
        Schema::table('sneakers', function (Blueprint $table) {
            $table->dropColumn('image');
        });
    }
};
