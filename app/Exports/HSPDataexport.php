<?php

namespace App\Exports;

use App\Training;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
class HSPDataexport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $Search2=\Session::get('Search1');
        if ($Search2 ==""){
        return Training::all('id','name','HSP_Status','HSP_StadyDate','HSP_ExpireDate','HSP_ReminderDate','HSP_Notification');
    
    }else{
        $Trainings1 = Training::where('id','LIKE', '%' . $Search2 . '%')
        ->orWhere('name','LIKE', '%' . $Search2 . '%')
        ->orWhere('HSP_Status','LIKE', '%' . $Search2 . '%')
        ->orWhere('HSP_StadyDate','LIKE', '%' . $Search2 . '%')
        ->orWhere('HSP_ReminderDate','LIKE', '%' . $Search2 . '%')
        ->orderBy('name')
        ->select( 'id','Name','HSP_Status','HSP_StadyDate','HSP_ExpireDate','HSP_ReminderDate','HSP_Notification')
        ->get();
    return $Trainings1;
    }
    
    }

    public function headings(): array
    {
        return [
            'id',
            'Name',
            'HSP Status',
            'HSP StadyDate',
            'HSP ExpireDate',
            'HSP ReminderDate',
            'HSP Notification',
           
        ];
    }

}
