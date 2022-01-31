<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListCategoryTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_category_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('list_category_id');
            $table->string('title')->nullable();
            $table->string('locale')->index();
            $table->unique(['list_category_id', 'locale']);
            $table->timestamps();
            $table->foreign('list_category_id')->references('id')->on('list_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('list_category_translations');
    }
}
