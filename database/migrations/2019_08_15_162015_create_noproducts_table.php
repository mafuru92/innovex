<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNoproductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('noproducts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('DayOfWeek')->nullable();
            $table->date('ActivityDate')->nullable();
            $table->string('PublicHoliday')->nullable();
            $table->integer('UnoccupiedTime')->nullable();
            $table->string('AnnualLeave')->nullable();
            $table->integer('HouseSearch')->nullable();
            $table->string('Sick')->nullable();
            $table->integer('TotalHour')->nullable();
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
        Schema::dropIfExists('noproducts');
    }
}
