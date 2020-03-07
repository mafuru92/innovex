<?php

namespace App\Exports;

use App\Department;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
class Departments implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $Search2=\Session::get('Search1');
        if ($Search2 ==""){
        return Department::all('id','DepartmentName','UpdatedBy','updated_at');
    
    }else{
        $Trainings1 = Department::where('DepartmentName','LIKE', '%' . $Search2 . '%')
        ->orWhere('id','LIKE', '%' . $Search2 . '%')
        ->select( 'id','DepartmentName','UpdatedBy','updated_at')
        ->get();
    return $Trainings1;
    }
    
    }

    public function headings(): array
    {
        return [
            'id','DepartmentName','UpdatedBy','updated_at' 
        ];
    }

}
