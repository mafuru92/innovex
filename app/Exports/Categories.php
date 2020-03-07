<?php

namespace App\Exports;

use App\Itemcategory;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
class Categories implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $Search2=\Session::get('Search1');
        if ($Search2 ==""){
        return Itemcategory::all('id','Category','UpdatedBy','updated_at');
    
    }else{
        $Trainings1 = Itemcategory::where('Category','LIKE', '%' . $Search2 . '%')
        ->orWhere('id','LIKE', '%' . $Search2 . '%')
        ->select( 'id','Category','UpdatedBy','updated_at')
        ->get();
    return $Trainings1;
    }
    
    }

    public function headings(): array
    {
        return [
            'id','Category','UpdatedBy','updated_at' 
        ];
    }

}
