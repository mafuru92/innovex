<?php
use Illuminate\Support\Facades\Session;
namespace App\Http\Controllers;
use App\Exports\AllServers;
use App\Exports\StudiesExtensionDataexport;
use App\Exports\StudiesReportDataexport;
use App\Exports\HSPDataexport;
use Maatwebsite\Excel\Facades\Excel;
use \PDF;
use App\Auditschema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class AuditschemasController extends Controller
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
        //$Servers = Auditschema::where('user_id', Auth::user()->id)->get();
        $Search = $request->input('Search');
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        //if(isset($find)){
            if ($Search !="" && $start_date =="" ){
                \Session::put('Search1', $Search);
                $Auditschemas =Auditschema::where('AssignmentName','LIKE', '%' . $Search . '%')
                        ->orWhere('AssignmentSupervisor','LIKE', '%' . $Search . '%')
                        ->orWhere('StaffAssigned','LIKE', '%' . $Search . '%')
                        ->get();
                 return view('auditschemas.index',['Auditschemas'=>$Auditschemas]);
            }
              elseif ($Search =="" && $start_date !="" ){
                    $Auditschemas =Auditschema::where('AuditExecution','>=', $start_date)
                    ->where('AuditExecution','<=', $end_date)
                    ->get();
                 return view('auditschemas.index',['Auditschemas'=>$Auditschemas]);
            }
            elseif ($Search !="" && $start_date !="" ){
              $Auditschemas =Auditschema::where('AuditExecution','>=', $start_date)
                       ->where('AuditExecution','<=', $end_date)
                       ->where('StaffAssigned','LIKE', '%' . $Search . '%')

                       ->orWhere('AssignmentSupervisor','LIKE', '%' . $Search . '%')
                       ->where('AuditExecution','>=', $start_date)
                       ->where('AuditExecution','<=', $end_date)

                       ->orWhere('AssignmentName','LIKE', '%' . $Search . '%')
                       ->where('AuditExecution','>=', $start_date)
                       ->where('AuditExecution','<=', $end_date)
                       ->get();
return view('auditschemas.index',['Auditschemas'=>$Auditschemas]);
    
       }else{
            \Session::put('Search1', '');
          $Auditschemas = Auditschema::where('id','!=',0)
          ->orderBy('id', 'DESC')
          ->paginate(50);

        return view('auditschemas.index',['Auditschemas'=>$Auditschemas]);
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
        if ((Auth::user()->UserLevel) != 'Admin') {
            return redirect()->route('auditschema.index')
        ->with('success','You have No Permision to create any Information, if you think this is an error Please contact the Super Admin');
        }else{

          
        return view('auditschemas.create');
        }
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
        $Auditschema=Auditschema::create([
                 'AssignmentName'=>$request->input('AssignmentName'),
                 'AssignmentSupervisor'=>$request->input('AssignmentSupervisor'),
                 'StaffAssigned'=>$request->input('StaffAssigned'),
                 'PlanningMeeting'=>$request->input('PlanningMeeting'),
                 'KickoffMeeting'=>$request->input('KickoffMeeting'),
                 'EntryMeeting'=>$request->input('EntryMeeting'),
                 'AuditExecution'=>$request->input('AuditExecution'),
                 'DraftReport'=>$request->input('DraftReport'),
                // 'AssignmentId'=>$request->input('UserId')."_".$request->input('AssignmentDate')."_".$request->input('AssignmentName'),
                 'ExitMeeting'=>$request->input('ExitMeeting'),
                 'FinalReport'=>$request->input('FinalReport'),
                 'UpdatedBy'=>auth::user()->email
                 ]);
if ($Auditschema){
    $Auditschemas = Auditschema::where('id','!=',0)->get();

    return view('auditschemas.index',['Auditschemas'=>$Auditschemas])->with('success','Task Created Successfully');
    //return back()->withinput()->with('success','Task Created Successfully');


    }
  
}
return back()->withinput()->with('errors','Error Creating a new Task');
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Auditschema  $Auditschema
     * @return \Illuminate\Http\Response
     */
    public function show(Auditschema $Auditschema)
    {
        $Auditschema  = Auditschema::find($Auditschema->id);
       return view('auditschemas.show',['Auditschema'=>$Auditschema]);

    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Auditschema  $Auditschema
     * @return \Illuminate\Http\Response
     */
    public function edit(Auditschema $Auditschema)
    {
        if ((Auth::user()->UserLevel) != 'Admin') {
            return redirect()->route('auditschema.index')
        ->with('success','You have No Permision to delete any Information, if you think this is an error Please contact the Super Admin');
        }else{

        //
        $Auditschema  = Auditschema::find($Auditschema->id);
        return view('auditschemas.edit',['Auditschema'=>$Auditschema]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Auditschema  $Auditschema
     * @return \Illuminate\Http\Response
     */
 
    public function update(Request $request, Auditschema $Auditschema)
    {
        // save data
        $AuditschemaUpdate=Auditschema::where('id', $Auditschema->id)
                              ->update([
                              'AssignmentName'=>$request->input('AssignmentName'),
                              'AssignmentSupervisor'=>$request->input('AssignmentSupervisor'),
                              'StaffAssigned'=>$request->input('StaffAssigned'),
                              'PlanningMeeting'=>$request->input('PlanningMeeting'),
                              'KickoffMeeting'=>$request->input('KickoffMeeting'),
                              'EntryMeeting'=>$request->input('EntryMeeting'),
                              'AuditExecution'=>$request->input('AuditExecution'),
                              'DraftReport'=>$request->input('DraftReport'),
                             // 'AssignmentId'=>$request->input('UserId')."_".$request->input('AssignmentDate')."_".$request->input('AssignmentName'),
                              'ExitMeeting'=>$request->input('ExitMeeting'),
                              'FinalReport'=>$request->input('FinalReport'),
                              'UpdatedBy'=>auth::user()->email
                                       ]);
if ($AuditschemaUpdate){

          return back()->withinput()->with('success','Updated Successfully');
}

        //redirect
       // return back()->withinput();
       return back()->withinput()->with('errors','Error Updating a Auditschema');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Auditschema  $Auditschema
     * @return \Illuminate\Http\Response
     */
    public function destroy(Auditschema $Auditschema)
    {
            //
    
              if ((Auth::user()->UserLevel) != 'Admin') {
                    return redirect()->route('auditschema.index')
                ->with('success','You have No Permision to delete any Information, if you think this is an error Please contact the Super Admin');
                }else{
    
            Auditschema::where('id', $Auditschema->id)->update(['UpdatedBy'=>auth::user()->email]);
            $findAuditschema  = Auditschema::where('ID',$Auditschema->id);
            if($findAuditschema ->delete()){
                return redirect()->route('auditschema.index')
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
public function exportpdf(Auditschema $Auditschemas)
{
  // Fetch all customers from database
  $Auditschema = Auditschema::find($Auditschemas->id);
//echo $Auditschemas->id;
  // Send data to the view using loadView function of PDF facade
    $pdf = \PDF::loadView('Auditschemas.expTopdf', ['Auditschema'=>$Auditschema]);

  // Finally, you can download the file using download function
    return $pdf->download('PDFExports.pdf');
}
//*********************************** */ END Export to PDF Functions *************************************

}
