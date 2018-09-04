<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tables', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('table_number');
            $table->integer('capacity');
            $table->string('location');
            $table->integer('id_facility');
            $table->boolean('status');
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
        Schema::dropIfExists('tables');
    }
}
