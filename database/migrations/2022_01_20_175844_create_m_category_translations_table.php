<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMCategoryTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_category_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('m_category_id');
            $table->string('title')->nullable();
            $table->string('locale')->index();
            $table->unique(['m_category_id', 'locale']);
            $table->timestamps();
            $table->foreign('m_category_id')->references('id')->on('m_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_category_translations');
    }
}
