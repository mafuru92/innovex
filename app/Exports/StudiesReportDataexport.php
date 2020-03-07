<?php

namespace App\Exports;

use App\Approvalinfor;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;


class StudiesReportDataexport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $Search2=\Session::get('Search1');
        $today= date('Y-m-d');

        if ($Search2 ==""){

        $approvalinfors1 = Approvalinfor::where('NextSixMonthReportDate','<=',$today)
                                         ->where('NextSixMonthReportDate', '!=','0000-00-00')
                                         ->where('Status', '!=','Closed')
                                         ->orwhere(function($query){
                                                    $today= date('Y-m-d');
                                                     $query->where('ReportReminderDate','<=',$today)
                                                           ->where('ReportReminderDate', '!=','0000-00-00')
                                                           ->where('Status', '!=','Closed');
                    })->select( 'ID',
                                'StudyID',
                                'StudyName',
                                'SubmissionType',
                                'ApprovalType',
                                'ApplicationLevel',
                                'SubmissionDate',
                                'AprovalDate',
                                'NextSixMonthReportDate',
                                'ReportReminderDate',
                                'ExtansionDate',
                                'ExtensionRemainderDate',
                                'ReportSubmitted',
                                'ReportSubmittedDate',
                                'NextExtansionDate',
                                'ReportNotification',
                                'ExtensionNotification',
                                'Status',
                                'Comments',
                                'Extended',
                                'EndDateOfStudy'
                                 )->get();
                     return $approvalinfors1;

                    }else{

                        $approvalinfors1 = Approvalinfor::where('NextSixMonthReportDate','<=',$today)
                       ->where('NextSixMonthReportDate', '!=','0000-00-00')
                       ->where('Status', '!=','Closed')
                       ->Where('StudyID','LIKE', '%' . $Search2 . '%')
    
                       ->orwhere('NextSixMonthReportDate','<=',$today)
                       ->where('NextSixMonthReportDate', '!=','0000-00-00')
                       ->where('Status', '!=','Closed')
                       ->Where('StudyName','LIKE', '%' . $Search2 . '%')
    
                       ->orwhere('ReportReminderDate','<=',$today)
                       ->where('ReportReminderDate', '!=','0000-00-00')
                       ->where('Status', '!=','Closed')
                       ->Where('StudyName','LIKE', '%' . $Search2 . '%')
    
                       ->orwhere('ReportReminderDate','<=',$today)
                       ->where('ReportReminderDate', '!=','0000-00-00')
                       ->where('Status', '!=','Closed')
                       ->Where('StudyID','LIKE', '%' . $Search2 . '%')
                 ->get();
                        return $approvalinfors1;      
                }
    }


    public function headings(): array
    {
        return [
            'ID',
            'StudyID',
            'StudyName',
            'SubmissionType',
            'ApprovalType',
            'ApplicationLevel',
            'SubmissionDate',
            'AprovalDate',
            'NextSixMonthReportDate',
             'ReportReminderDate',
             'ExtansionDate',
             'ExtensionRemainderDate',
             'ReportSubmitted',
             'ReportSubmittedDate',
             'NextExtansionDate',
             'ReportNotification',
             'ExtensionNotification',
             'Status',
             'Comments',
             'Extended',
             'EndDateOfStudy',
        ];
    }

}
