<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('list_type_id')->constrained()->onDelete('cascade');
            $table->integer('lists_category_id')->constrained()->onDelete('cascade');
            $table->string('slug')->nullable();
            $table->string('image')->nullable();
            $table->string('anons_image')->nullable();
            $table->text('body_image')->nullable();
            $table->integer('show_on_slider')->nullable();
            $table->integer('pdf_type')->nullable();
            $table->string('video_code')->nullable();
            $table->string('video')->nullable();
            $table->integer('media_type')->nullable();
            $table->string('link')->nullable();
            $table->integer('link_type')->nullable();
            $table->integer('parent_id')->nullable();
            $table->integer('right_menu')->nullable();
            $table->date('date')->nullable();
            $table->integer('order')->nullable();
            $table->integer('count_view')->unsigned()->default(0)->nullable();
            $table->integer('status');
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
        Schema::dropIfExists('lists');
    }
}
