<?php
use Illuminate\Support\Facades\Session;
namespace App\Http\Controllers;
use App\Exports\AllItems;
use App\Exports\StudiesExtensionDataexport;
use App\Exports\StudiesReportDataexport;
use App\Exports\HSPDataexport;
use Maatwebsite\Excel\Facades\Excel;
use \PDF;
use App\Noproduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class NoproductsController extends Controller
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
        //$Servers = Noproduct::where('user_id', Auth::user()->id)->get();
        $Search = $request->input('Search');
        //if(isset($find)){
            if ($Search !=""){
                \Session::put('Search1', $Search);
                $Noproducts =Noproduct::where('ActivityDate','LIKE', '%' . $Search . '%')
                ->orWhere('id','LIKE', '%' . $Search . '%')
            ->get();
    return view('noproducts.index',['noproduct'=>$Noproducts]);
        }else{
            \Session::put('Search1', '');
          $Noproducts = Noproduct::where('id','!=',0)->get();

        return view('noproducts.index',['Noproducts'=>$Noproducts]);
    }
}

    return view('auth.login');
    }


    
    //************************************************************************************************* */
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('noproducts.create');
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
        $Noproduct=Noproduct::create([
                 'DayOfWeek'=>$request->input('DayOfWeek'),
                 'ActivityDate'=>$request->input('ActivityDate'),
                 'PublicHoliday'=>$request->input('PublicHoliday'),
                 'UnoccupiedTime'=>$request->input('UnoccupiedTime'),
                 'AnnualLeave'=>$request->input('AnnualLeave'),
                 'HouseSearch'=>$request->input('HouseSearch'),
                 'Sick'=>$request->input('Sick'),
                // 'AssignmentId'=>$request->input('UserId')."_".$request->input('AssignmentDate')."_".$request->input('AssignmentName'),
                 'TotalHour'=>$request->input('TotalHour'),
                 
                 ]);
if ($Noproduct){
    $Noproducts = Noproduct::where('id','!=',0)->get();

    return view('noproducts.index',['Noproducts'=>$Noproducts])->with('success','Task Created Successfully');
    //return back()->withinput()->with('success','Task Created Successfully');


    }
  
}
return back()->withinput()->with('errors','Error Creating a new Task');
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Noproduct  $Noproduct
     * @return \Illuminate\Http\Response
     */
    public function show(Noproduct $Noproduct)
    {
        $Noproduct  = Noproduct::find($Noproduct->id);
       return view('noproducts.show',['Noproduct'=>$Noproduct]);

    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Noproduct  $Noproduct
     * @return \Illuminate\Http\Response
     */
    public function edit(Noproduct $Noproduct)
    {
        //
        $Noproduct  = Noproduct::find($Noproduct->id);
        return view('noproducts.edit',['Noproduct'=>$Noproduct]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Noproduct  $Noproduct
     * @return \Illuminate\Http\Response
     */
 
    public function update(Request $request, Noproduct $Noproduct)
    {
        // save data
        $ActivityUpdate=Noproduct::where('id', $Noproduct->id)
                              ->update([
                                'DayOfWeek'=>$request->input('DayOfWeek'),
                                'ActivityDate'=>$request->input('ActivityDate'),
                                'PublicHoliday'=>$request->input('PublicHoliday'),
                                'UnoccupiedTime'=>$request->input('UnoccupiedTime'),
                                'AnnualLeave'=>$request->input('AnnualLeave'),
                                'HouseSearch'=>$request->input('HouseSearch'),
                                'Sick'=>$request->input('Sick'),
                             // 'AssignmentId'=>$request->input('UserId')."_".$request->input('AssignmentDate')."_".$request->input('AssignmentName'),
                                'TotalHour'=>$request->input('TotalHour'),
                                
                            
                                       ]);
if ($ActivityUpdate){
    
          return back()->withinput()->with('success','Updated Successfully');
}

        //redirect
       // return back()->withinput();
       return back()->withinput()->with('errors','Error Updating a Noproduct');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Noproduct  $Noproduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(Noproduct $Noproduct)
    {
            //
    
              if ((Auth::user()->UserLevel) != 'Admin') {
                    return redirect()->route('noproducts.index')
                ->with('success','You have No Permision to delete any Information, if you think this is an error Please contact the Super Admin');
                }else{
    
            /*Noproduct::where('id', $Noproduct->id)->update(['UpdatedBy'=>auth::user()]);*/
            $findNoproduct  = Noproduct::where('ID',$Noproduct->id);
            if($findNoproduct ->delete()){
                return redirect()->route('noproduct.index')
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
public function exportpdf(Noproduct $Noproducts)
{
  // Fetch all customers from database
  $Noproduct = Noproduct::find($Noproducts->id);
//echo $Noproducts->id;
  // Send data to the view using loadView function of PDF facade
    $pdf = \PDF::loadView('Noproducts.expTopdf', ['Noproduct'=>$Noproduct]);

  // Finally, you can download the file using download function
    return $pdf->download('PDFExports.pdf');
}
//*********************************** */ END Export to PDF Functions *************************************

}
