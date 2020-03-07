<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    //
   protected $fillable=[
       'DayOfWeek',
       'ActivityDate',
       'OfficeWork',
       'staffMeeting',
       'staffTraining',
       'OutTraining',
       'Schooling',
       'StudyLeave',
       'Travelling',
       'TotalHour',
       'updated_at'

    ];

}
