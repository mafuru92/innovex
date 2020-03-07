<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskReport extends Model
{
    protected $table = 'task_reports';

    protected $fillable = [
        'assignmentName', 'assignedTime', 'workingHours'
    ];
}
