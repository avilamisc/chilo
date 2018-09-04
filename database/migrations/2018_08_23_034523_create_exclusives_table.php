<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExclusivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exclusives', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('category');
            $table->string('description');
            $table->boolean('status');
            $table->dateTime('start');
            $table->dateTime('end');
            $table->string('amount')->nullable();
            $table->string('amount_type')->nullable();
            $table->integer('availability')->nullable();
            $table->integer('created_by');
            $table->timestamps();
            $table->integer('mod_by')->nullable();
            $table->dateTime('mod_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exclusives');
    }
}
