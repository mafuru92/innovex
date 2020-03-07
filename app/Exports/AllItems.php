<?php
use Illuminate\Support\Facades\Session;
namespace App\Exports;

use App\Item;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
class AllItems implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $Search2=\Session::get('Search1');
        if ($Search2 ==""){
        return Item::all(   'id',
                            'LeaseeName',
                            'LeaseeDepartment',
                            'ItemCategory',
                            'ItermBrand',
                            'ItemName',
                            'ItemType',
                            'serialNumber',
                            'os',
                            'returned',
                            'AssetNumber',
                            'ItemModel',
                            'RAM',
                            'HDD',
                            'Screen',
                            'Keyboard',
                            'Battery',
                            'Touchpad',
                            'PhysicalMachineServers',
                            'PurchasedDate',
                            'LeaseDate',
                            'IpAddress',
                            'MACAdress',
                            'ItemCondition',
                            'Comments',
                            'UpdatedBy'
                          
                                );
                            }else{

                                $Item1 = Item::where('LeaseeName','LIKE', '%' . $Search2 . '%')
                                ->orWhere('LeaseeDepartment','LIKE', '%' . $Search2 . '%')
                               ->orWhere('ItemName','LIKE', '%' . $Search2 . '%')
                               ->orWhere('ItemCondition','LIKE', '%' . $Search2 . '%')
                                ->orWhere('LeaseDate','LIKE', '%' . $Search2 . '%')
                                                    ->select(   'id',
                                                                'LeaseeName',
                                                                'LeaseeDepartment',
                                                                'ItemCategory',
                                                                'ItermBrand',
                                                                'ItemName',
                                                                'ItemType',
                                                                'serialNumber',
                                                                'os',
                                                                'returned',
                                                                'AssetNumber',
                                                                'ItemModel',
                                                                'RAM',
                                                                'HDD',
                                                                'Screen',
                                                                'Keyboard',
                                                                'Battery',
                                                                'Touchpad',
                                                                'PhysicalMachineServers',
                                                                'PurchasedDate',
                                                                'LeaseDate',
                                                                'IpAddress',
                                                                'MACAdress',
                                                                'ItemCondition',
                                                                'Comments',
                                                                'UpdatedBy'
                             ) ->get();
                                return $Item1;

    }
    }

    public function headings(): array
    {
        return [
            'id',
            'LeaseeName',
            'LeaseeDepartment',
            'ItemCategory',
            'ItermBrand',
            'ItemName',
            'ItemType',
            'serialNumber',
            'OS',
            'returned',
            'AssetNumber',
            'ItemModel',
            'RAM',
            'HDD',
            'Screen',
            'Keyboard',
            'Battery',
            'Touchpad',
            'PhysicalMachineServers',
            'PurchasedDate',
            'LeaseDate',
            'IpAddress',
            'MACAdress',
            'ItemCondition',
            'Comments',
            'UpdatedBy'
        ];
    }

}
