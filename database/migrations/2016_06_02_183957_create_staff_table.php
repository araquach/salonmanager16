<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staffs', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('person_id')->unsigned();
			$table->integer('iris_id')->unsigned();
			$table->integer('salon_id')->unsigned();
			$table->integer('staff_role_id')->unsigned();
			$table->date('dob');
			$table->integer('working_hours_week')->unsigned();
			$table->integer('holiday_entitlement')->unsigned();
			$table->boolean('active');
			$table->integer('role')->unsigned();
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
        Schema::drop('staffs');
    }
}
