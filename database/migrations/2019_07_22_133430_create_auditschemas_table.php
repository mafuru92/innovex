<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuditschemasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auditschemas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('AssignmentName')->nullable();
            $table->string('AssignmentSupervisor')->nullable();
            $table->string('StaffAssigned')->nullable();
            $table->date('PlanningMeeting')->nullable();
            $table->date('KickoffMeeting')->nullable();
            $table->date('EntryMeeting')->nullable();
            $table->date('AuditExecution')->nullable();
            $table->date('DraftReport')->nullable();
            $table->date('ExitMeeting')->nullable();
            $table->date('FinalReport')->nullable();
            $table->string('UpdatedBy')->nullable();
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
        Schema::dropIfExists('auditschemas');
    }
}
