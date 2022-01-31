<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManagementTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('management_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('management_id');
            $table->string('title')->nullable();
            $table->string('leader')->nullable();
            $table->text('reception')->nullable();
            $table->text('address')->nullable();
            $table->longText('biography')->nullable();
            $table->text('description')->nullable();
            $table->longText('content')->nullable();
            $table->string('locale')->index();
            $table->unique(['management_id', 'locale']);
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('management_id')->references('id')->on('management')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('management_translations');
    }
}
