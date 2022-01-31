<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListTypeTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_type_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('list_type_id');
            $table->string('title')->nullable();
            $table->string('locale')->index();
            $table->unique(['list_type_id', 'locale']);
            $table->timestamps();
            $table->foreign('list_type_id')->references('id')->on('list_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('list_type_translations');
    }
}
