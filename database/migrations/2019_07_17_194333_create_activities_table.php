<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hastable('activities')){
        Schema::create('activities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('DayOfWeek')->nullable();
            $table->date('ActivityDate')->nullable();
            $table->string('AssignmentName')->nullable();
            $table->string('SubAssignment')->nullable();
            $table->string('SubAssignmentTwo')->nullable();
            $table->string('SubassignmentThree')->nullable();
            $table->integer('DurationHours')->nullable();
            $table->integer('DurationMinutes')->nullable();
            $table->string('UpdatedBy')->nullable();
            $table->timestamps();
        });
    }
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activities');
    }
}
