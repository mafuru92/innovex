<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Audittrail extends Model
{
    //
   protected $fillable=[
       'TableName',
       'IDs',
       'ColumName',
       'OldValue',
       'NewValue',
       'ChangedOn',
       'ChangedBy',
       'action',
        ];

}
