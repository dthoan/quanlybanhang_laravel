<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Theme extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('theme', function (Blueprint $table) {
            $table->increments('id_theme');

            $table->string('name',200)->nullable();
            $table->string('description',200)->default('Chưa có description');
            $table->string('image',200)->default('image1.jpg');
            $table->string('content',200);
            $table->integer('status')->default(0);
            $table->string('alias',200)->default('chua-co-alias');
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
        //
    }
}
