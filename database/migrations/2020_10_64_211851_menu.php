<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Menu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('menu', function (Blueprint $table) {
            $table->id();
            $table->string('category', 255)->index()->nullable();
            $table->string('title', 255)->index();
            $table->foreign('category')->references('category')->on('categories')->onDelete('set null')->onUpdate('cascade');;
            $table->foreign('title')->references('title')->on('posts')->onDelete('cascade')->onUpdate('cascade');
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
