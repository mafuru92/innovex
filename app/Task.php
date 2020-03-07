<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Activity;

class Task extends Model
{
    //
    protected $fillable=[
        'UserId',
        'AssignmentName',
        'AssignedTime',
        'StartDate',
        'EndDate',
        'Status',
        'UpdatedBy',
        'updated_at',
       
    ];

    public function users(){
        return $this->hasMany('User');
    }

    public function activity(){
        return $this->hasMany('Activity');
    }


    
}
