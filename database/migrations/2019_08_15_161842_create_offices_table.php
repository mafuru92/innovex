<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfficesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('DayOfWeek')->nullable();
            $table->date('ActivityDate')->nullable();
            $table->string('OfficeWork')->nullable();
            $table->integer('staffMeeting')->nullable();
            $table->string('staffTraining')->nullable();
            $table->integer('OutTraining')->nullable();
            $table->string('Schooling')->nullable();
            $table->string('StudyLeave')->nullable();
            $table->string('Travelling')->nullable();
            $table->string('TotalHour')->nullable();
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
        Schema::dropIfExists('offices');
    }
}
