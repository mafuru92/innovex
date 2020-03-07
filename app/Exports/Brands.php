<?php

namespace App\Exports;

use App\Itembrand;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
class Brands implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $Search2=\Session::get('Search1');
        if ($Search2 ==""){
        return Itembrand::all('id','Brands','UpdatedBy','updated_at');
    
    }else{
        $Trainings1 = Itembrand::where('Brands','LIKE', '%' . $Search2 . '%')
        ->orWhere('id','LIKE', '%' . $Search2 . '%')
        ->select( 'id','Brands','UpdatedBy','updated_at')
        ->get();
    return $Trainings1;
    }
    
    }

    public function headings(): array
    {
        return [
            'id','Brands','UpdatedBy','updated_at' 
        ];
    }

}
