<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auditschema extends Model
{
    protected $table = 'auditschemas';
    //
   protected $fillable=[
       'AssignmentName',
       'AssignmentSupervisor',
       'StaffAssigned',
       'PlanningMeeting',
       'KickoffMeeting',
       'EntryMeeting',
       'AuditExecution',
       'DraftReport',
       'ExitMeeting',
       'FinalReport',
       'UpdatedBy',
       'updated_at'

    ];

    public function user(){
        return $this->hasMany('App\Auditschema');
    }

}
