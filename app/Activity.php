<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Task;

class Activity extends Model
{


    protected $table = 'activities';

    //
   protected $fillable=[
       'user_id',
       'DayOfWeek',
       'ActivityDate',
       'AssignmentName',
       'SubAssignment',
       'SubAssignmentTwo',
       'SubassignmentThree',
       'DurationHours',
       'updated_at',
       'task_id'

    ];

    public function task(){
        return $this->belongsTo('Task');
    }

}
