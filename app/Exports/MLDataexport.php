<?php

namespace App\Exports;

use App\Training;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
class MLDataexport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $Search2=\Session::get('Search1');
        if ($Search2 ==""){
        return Training::all('id','Name','ML_Status','ML_StadyDate','ML_ExpireDate','ML_ReminderDate','ML_Notification');
    
    }else{
        $Trainings1 = Training::where('id','LIKE', '%' . $Search2 . '%')
        ->orWhere('Name','LIKE', '%' . $Search2 . '%')
        ->orWhere('ML_Status','LIKE', '%' . $Search2 . '%')
        ->orWhere('ML_StadyDate','LIKE', '%' . $Search2 . '%')
        ->orWhere('ML_ReminderDate','LIKE', '%' . $Search2 . '%')
        ->orderBy('Name')
        ->select( 'id','Name','ML_Status','ML_StadyDate','ML_ExpireDate','ML_ReminderDate','ML_Notification')
        ->get();
    return $Trainings1;
    }
    
    }

    public function headings(): array
    {
        return [
            'id',
            'Name',
            'ML Status',
            'ML IssuedDate',
            'ML ExpireDate',
            'ML ReminderDate',
            'ML Notification',
           
        ];
    }

}
