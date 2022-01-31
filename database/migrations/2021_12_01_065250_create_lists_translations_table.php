<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListsTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lists_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lists_id');
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->longText('content')->nullable();
            $table->string('pdf_title')->nullable();
            $table->string('pdf')->nullable();
            $table->string('locale')->index();
            $table->unique(['lists_id', 'locale']);
            $table->timestamps();
            $table->foreign('lists_id')->references('id')->on('lists')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lists_translations');
    }
}
