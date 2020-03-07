<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAudittrailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hastable('audittrails')){
        Schema::create('audittrails', function (Blueprint $table) {
            $table->increments('id');
            $table->string('TableName')->nullable();
            $table->string('IDs')->nullable();
            $table->string('ColumName')->nullable();
            $table->string('OldValue')->nullable();
            $table->string('NewValue')->nullable();
            $table->dateTime('ChangedOn')->nullable();
            $table->string('ChangedBy')->nullable();
            $table->string('ChangedBy1')->nullable();
            $table->string('action')->nullable();
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
        Schema::dropIfExists('itemaudittrails');
    }
}
