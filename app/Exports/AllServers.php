<?php

namespace App\Exports;

use App\Server;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
class AllServers implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $Search2=\Session::get('Search1');
        if ($Search2 ==""){
        return Server::all('id','ServerName','UpdatedBy','updated_at');
    
    }else{
        $Trainings1 = Server::where('ServerName','LIKE', '%' . $Search2 . '%')
        ->orWhere('id','LIKE', '%' . $Search2 . '%')
        ->select( 'id','ServerName','UpdatedBy','updated_at')
        ->get();
    return $Trainings1;
    }
    
    }

    public function headings(): array
    {
        return [
            'id','ServerName','UpdatedBy','updated_at' 
        ];
    }

}
