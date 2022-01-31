<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('link');
            $table->integer('link_type');
            $table->string('image')->nullable();
            $table->integer('parent_id')->nullable();
            $table->foreignId('menus_category_id')->references('id')->on('menus_categories')->onDelete('cascade');
            $table->integer('status');
            $table->integer('order')->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->integer('modifier_id')->constrained()->onDelete('cascade')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('menus');
    }
}
