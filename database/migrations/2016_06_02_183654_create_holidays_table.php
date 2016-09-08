<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHolidaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('holidays', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('staff_id')->unsigned();
			$table->integer('hours_requested');
			$table->boolean('prebooked');
			$table->dateTime('request_date_from');
			$table->dateTime('request_date_to');
			$table->boolean('approved');
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
        Schema::drop('holidays');
    }
}
