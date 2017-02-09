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
        Schema::create('staff', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('person_id')->unsigned();
			$table->integer('iris_id');
			$table->integer('salon_id')->unsigned();
			$table->integer('staff_role_id')->unsigned();
			$table->date('dob');
			$table->string('username');
			$table->string('password');
			$table->integer('working_hours_week');
			$table->integer('holiday_entitlement');
			$table->boolean('active');
			$table->integer('role');
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
        Schema::drop('staff');
    }
}
