<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusCategoryTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus_category_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('menus_category_id');
            $table->string('title')->nullable();
            $table->string('locale')->index();
            $table->unique(['menus_category_id', 'locale']);
            $table->timestamps();
            $table->foreign('menus_category_id')->references('id')->on('menus_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus_category_translations');
    }
}
