<?php
use Illuminate\Support\Facades\Session;
namespace App\Http\Controllers;
use App\Exports\Departments;
use App\Exports\StudiesExtensionDataexport;
use App\Exports\StudiesReportDataexport;
use App\Exports\HSPDataexport;
use Maatwebsite\Excel\Facades\Excel;
use \PDF;
use App\Task;
use App\User;
use App\Auditschema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

use App\TaskReport;

class AssignmentsController extends Controller
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
        //$Departments = Department::where('user_id', Auth::user()->id)->get();
        $Search = $request->input('Search');
        //if(isset($find)){
            if ($Search !=""){
                \Session::put('Search1', $Search);
                $Tasks = Task::where('id','LIKE', '%' . $Search . '%')
                ->orWhere('id','LIKE', '%' . $Search . '%')
            ->get();
    return view('task.index',['Tasks'=>$Tasks]);
        }else{
            \Session::put('Search1', '');
          $Tasks = Task::where('id','!=',0)
          ->orderBy('id', 'DESC')
          ->paginate(3);

        return view('task.index',['Tasks'=>$Tasks]);
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
            return redirect()->route('task.index')
        ->with('success','You have No Permision to create any Information, if you think this is an error Please contact the Super Admin');
        }else{
        //
        $Users = User::where('id','!=',0)->get();
        $assignments = Auditschema::all();
        
        return view('task.create')->with(
            [
                'Users'=> $Users,
                'assignments' => $assignments
            ]);
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
        $Task=Task::create([
                 'UserId'=>$request->input('UserId'),
                 'AssignmentName'=>$request->input('AssignmentName'),
                 'AssignedTime'=>$request->input('AssignedTime'),
                 'StartDate'=>$request->input('StartDate'),
                 'EndDate'=>$request->input('EndDate'),
                 'Status'=>$request->input('Status'),
                 'UpdatedBy'=>auth::user()->email
                 ]);
            
                 $user_report = DB::table('users')->where('email', $Task->UserId)->first();

            $task_report = new TaskReport;
                $task_report->assignmentName = $request->AssignmentName;
                $task_report->assignedTime = $request->AssignedTime;
                $task_report->user_id = $user_report->id;
                $task_report->save();

            if ($Task){
                return back()->withinput()->with('success','Task Created Successfully');
            }
  
        }
        return back()->withinput()->with('errors','Error Creating a new Task');
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $Item
     * @return \Illuminate\Http\Response
     */
    public function show(Task $Task)
    {
        //

       $Tasks  = Task::find($Task->id);
       return view('task.show',['Tasks'=>$Tasks]);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $Item
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $Task)
    {
        if ((Auth::user()->UserLevel) != 'Admin') {
            return redirect()->route('task.index')
        ->with('success','You have No Permision to edit any Information, if you think this is an error Please contact the Super Admin');
        }else{


       $Users = User::where('id','!=',0)->get();
       $Tasks  = Task::find($Task->id);
        return view('task.edit')->with('Users', $Users)->with('Tasks', $Tasks);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $Item
     * @return \Illuminate\Http\Response
     */
 
    public function update(Request $request, Task $Tasks)
    { 
        if ((Auth::user()->UserLevel) != 'Admin') {
            return redirect()->route('task.index')
        ->with('success','You have No Permision to update any Information, if you think this is an error Please contact the Super Admin');
        }else{
        
        // save data
        $ItemUpdate=Task::where('id', $request->input('id'))
                              ->update([
                                'UserId'=>$request->input('UserId'),
                 'AssignmentName'=>$request->input('AssignmentName'),
                 'AssignedTime'=>$request->input('AssignedTime'),
                'StartDate'=>$request->input('StartDate'),
                 'EndDate'=>$request->input('EndDate'),
                 'Status'=>$request->input('Status'),
                 'UpdatedBy'=>auth::user()->email
                                       ]);
if ($ItemUpdate){
    return back()->withinput()->with('success','record Updated');
}

        //redirect
       // return back()->withinput();
       return back()->withinput()->with('errors','Error Updating a Item');
}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $Item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $Task)
    {
        //

          if ((Auth::user()->UserLevel) != 'Admin') {
                return redirect()->route('task.index')
            ->with('success','You have No Permision to delete any Information, if you think this is an error Please contact the Super Admin');
            }else{

        /*Task::where('ID', $Task->id)->update(['UpdatedBy'=>auth::user()->email]);*/
        $findTask  = Task::where('id',$Task->id);
        if($findTask->delete()){
            return redirect()->route('task.index')
            ->with('success','Information Deleted Successfully');
        }
        
        return back()->withinput()->with('error','Item Could not be Deleted');
    }}





//*********************************** */ Export to excel Functions *****************************************************
public function AllDepartments() 
{
    return Excel::download(new Departments, 'Departments.xlsx');
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
public function exportpdf(Task $Task)
{
  // Fetch all customers from database
  $Tasks = Task::find($Task->id);
//echo $Items->ID;
  // Send data to the view using loadView function of PDF facade
    $pdf = \PDF::loadView('task.expTopdf', ['Tasks'=>$Tasks]);

  // Finally, you can download the file using download function
    return $pdf->download('PDFExports.pdf');
}
//*********************************** */ END Export to PDF Functions *************************************

}
