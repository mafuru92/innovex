<?php
use Illuminate\Support\Facades\Session;
namespace App\Http\Controllers;
use App\Exports\Categories;
use App\Exports\StudiesExtensionDataexport;
use App\Exports\StudiesReportDataexport;
use App\Exports\HSPDataexport;
use Maatwebsite\Excel\Facades\Excel;
use App\Activity;
use App\Office;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class OfficesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index(Request $request)
    {
        //
        if (Auth::check()){

            if ((Auth::user()->Active) != 'Yes') {
                echo '<script>alert("Your Account Was not Activeted, Please Contact The supper Admin User to activate it")</script>';
                Auth::logout();
                return view('auth.login');
            }
        //$Servers = Office::where('user_id', Auth::user()->id)->get();
        $Search = $request->input('Search');
        //if(isset($find)){
            if ($Search !=""){
                \Session::put('Search1', $Search);
                $Offices =Office::where('ActivityDate','LIKE', '%' . $Search . '%')
                ->orWhere('id','LIKE', '%' . $Search . '%')
            ->get();
    return view('offices.index',['office'=>$Offices]);
        }else{
            \Session::put('Search1', '');
          $Offices = Office::where('id','!=',0)->get();

        return view('offices.index',['Offices'=>$Offices]);
    }
}

    return view('auth.login');
    }

    
  
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('offices.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if (Auth::check()){
        $Office=Office::create([
                 'DayOfWeek'=>$request->input('DayOfWeek'),
                 'ActivityDate'=>$request->input('ActivityDate'),
                 'OfficeWork'=>$request->input('OfficeWork'),
                 'staffTraining'=>$request->input('staffTraining'),
                 'OutTraining'=>$request->input('OutTraining'),
                 'Schooling'=>$request->input('Schooling'),
                 'StudyLeave'=>$request->input('StudyLeave'),
                 'TotalHour'=>$request->input('TotalHour'),
                // 'AssignmentId'=>$request->input('UserId')."_".$request->input('AssignmentDate')."_".$request->input('AssignmentName'),
                 'TotalHour'=>$request->input('TotalHour'),
                 
                 ]);
if ($Office){
    $Offices = Office::where('id','!=',0)->get();

    return view('offices.index',['Offices'=>$Offices])->with('success','Task Created Successfully');
    //return back()->withinput()->with('success','Task Created Successfully');


    }
  
}
return back()->withinput()->with('errors','Error Creating a new Task');
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Office  $Office
     * @return \Illuminate\Http\Response
     */
    public function show(Office $Office)
    {
        $Office  = Office::find($Office->id);
       return view('offices.show',['Office'=>$Office]);

    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Office  $Office
     * @return \Illuminate\Http\Response
     */
    public function edit(Office $Office)
    {
        //
        $Office  = Office::find($Office->id);
        return view('offices.edit',['Office'=>$Office]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Office  $Office
     * @return \Illuminate\Http\Response
     */
 
    public function update(Request $request, Office $Office)
    {
        // save data
        $ActivityUpdate=Office::where('id', $Office->id)
                              ->update([
                                'DayOfWeek'=>$request->input('DayOfWeek'),
                                'ActivityDate'=>$request->input('ActivityDate'),
                                'OfficeWork'=>$request->input('OfficeWork'),
                                'staffTraining'=>$request->input('staffTraining'),
                                'OutTraining'=>$request->input('OutTraining'),
                                'Schooling'=>$request->input('Schooling'),
                                'StudyLeave'=>$request->input('StudyLeave'),
                                'TotalHour'=>$request->input('TotalHour'),
                                // 'AssignmentId'=>$request->input('UserId')."_".$request->input('AssignmentDate')."_".$request->input('AssignmentName'),
                                'TotalHour'=>$request->input('TotalHour'),
                            
                                       ]);
if ($ActivityUpdate){
    
          return back()->withinput()->with('success','Updated Successfully');
}

        //redirect
       // return back()->withinput();
       return back()->withinput()->with('errors','Error Updating a Office');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Office  $Office
     * @return \Illuminate\Http\Response
     */
    public function destroy(Office $Office)
    {
            //
    
              //if ((Auth::user()->UserLevel) != 'Admin') {
                  //  return redirect()->route('office.index')
               // ->with('success','You have No Permision to delete any Information, if you think this is an error Please contact the Super Admin');
               // }else
               {
    
            /*Office::where('id', $Office->id)->update(['UpdatedBy'=>auth::user()]);*/
            $findOffice  = Office::where('ID',$Office->id);
            if($findOffice ->delete()){
                return redirect()->route('office.index')
                ->with('success','Information Deleted Successfully');
            }
            
            return back()->withinput()->with('error','record Could not be Deleted');
        }}
    

//*********************************** */ Export to excel Functions *****************************************************
public function PysicalServers() 
{
    return Excel::download(new AllServers, 'AllServers.xlsx');
}

public function StudiesExtensionexport() 
{
    
    return Excel::download(new StudiesExtensionDataexport, 'StudiesExtensionDataexport.xlsx');
}

public function StudiesReportexport() 
{
    
    return Excel::download(new StudiesReportDataexport, 'StudiesReportDataexport.xlsx');
}

//*********************************** * END Export to excel Functions***********************************

//*********************************** */ Export to PDF Functions ****************************************
public function exportpdf(Office $Offices)
{
  // Fetch all customers from database
  $Office = Office::find($Offices->id);
//echo $Offices->id;
  // Send data to the view using loadView function of PDF facade
    $pdf = \PDF::loadView('Offices.expTopdf', ['Office'=>$Office]);

  // Finally, you can download the file using download function
    return $pdf->download('PDFExports.pdf');
}
//*********************************** */ END Export to PDF Functions *************************************
public function officework()
{
    $Offices = Office41::where('id','!=',0)->get();
    return view('offices.officework',['Offices'=>$Offices]);
}
}
