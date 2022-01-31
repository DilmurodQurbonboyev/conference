<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appeals', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('inn');
            $table->text('address');
            $table->string('person');
            $table->bigInteger('person_inn');
            $table->text('person_address');
            $table->text('project');
            $table->text('project_price');
            $table->text('additional_info');
            $table->string('bank_number');
            $table->string('bank_email');
            $table->string('short_info')->nullable();
            $table->string('energy_save')->nullable();
            $table->string('other_info')->nullable();
            $table->string('confirm_info')->nullable();
            $table->integer('take_by_inn')->nullable();
            $table->integer('take_by_email')->nullable();
            // additional info
            $table->string('appeal_code')->nullable();
            $table->integer('status')->default(1);
            $table->string('user_ip')->nullable();
            $table->longText('code')->nullable();
            $table->text('browser_agent')->nullable();

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
        Schema::dropIfExists('appeals');
    }
}
