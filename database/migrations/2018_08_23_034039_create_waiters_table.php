<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWaitersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('waiters', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->integer('table_number');
            $table->string('employee_number');
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
        Schema::dropIfExists('waiters');
    }
}
