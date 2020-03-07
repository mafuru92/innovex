<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Noproduct extends Model
{
    //
   protected $fillable=[
       'user_id',
       'DayOfWeek',
       'ActivityDate',
       'PublicHoliday',
       'UnoccupiedTime',
       'AnnualLeave',
       'HouseSearch',
       'Sick',
       'TotalHour',
       'updated_at'

    ];

}
