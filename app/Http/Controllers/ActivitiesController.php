<?php
use Illuminate\Support\Facades\Session;
namespace App\Http\Controllers;
use App\Noproduct;
use Maatwebsite\Excel\Facades\Excel;
use \PDF;
use App\Activity;
use App\User;
use App\Office;
use App\Auditschema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use App\UserTask;
use App\Task;
use App\TaskReport;

class ActivitiesController extends Controller
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
        //$Servers = Activity::where('user_id', Auth::user()->id)->get();
        $Search = $request->input('Search');
        //if(isset($find)){
            if ($Search !=""){
                \Session::put('Search1', $Search);
                $Activities =Activity::where('AssignmentName','LIKE', '%' . $Search . '%')
                ->orWhere('id','LIKE', '%' . $Search . '%')
            ->get();
    return view('activity.index',['activity'=>$Activities]);
        }else{
            \Session::put('Search1', '');
          $Activities = Activity::where('user_id',Auth::user()->id)
          //->orderBy('id', 'DESC')
            //->paginate(2)
            ->get();
        return view('activity.index')->with('Activities', $Activities);
    }
}

    return view('auth.login');
    }

    
    public function managetimesheet(Request $request)
    {
        //
        if (Auth::check()){

            if ((Auth::user()->Active) != 'Yes') {
                echo '<script>alert("Your Account Was not Activeted, Please Contact The supper Admin User to activate it")</script>';
                Auth::logout();
                return view('auth.login');
            }
            if ((Auth::user()->UserLevel) != 'Admin') {
                echo '<script>alert("You have No permission to Manage staff timesheet")</script>';
                return view('home');
            }
        //$Servers = Activity::where('user_id', Auth::user()->id)->get();
        $Search = $request->input('Search');
        //if(isset($find)){
            if ($Search !=""){
                \Session::put('Search1', $Search);
                $users =User::where('id','LIKE', '%' . $Search . '%')
                ->orWhere('fname','LIKE', '%' . $Search . '%')
                ->orWhere('lname','LIKE', '%' . $Search . '%')
            ->get();
    return view('managetimesheet.index',['users'=>$users]);
        }else{
            \Session::put('Search1', '');
          $users = User::all();

        return view('managetimesheet.index',['users'=>$users]);
    }
}

    return view('auth.login');
    }


    public function managetimesheetview(Request $request, $userid)
    {
        //
        if (Auth::check()){

            if ((Auth::user()->Active) != 'Yes') {
                echo '<script>alert("Your Account Was not Activeted, Please Contact The supper Admin User to activate it")</script>';
                Auth::logout();
                return view('auth.login');
            }
            if ((Auth::user()->UserLevel) != 'Admin') {
                echo '<script>alert("You have No permission to Manage staff timesheet")</script>';
                return view('home');
            }

        //$Servers = Activity::where('user_id', Auth::user()->id)->get();
        $Search = $request->input('Search');
        //if(isset($find)){
            if ($Search !=""){
                \Session::put('Search1', $Search);
                $Activities =Activity::where('AssignmentName','LIKE', '%' . $Search . '%')
                ->orWhere('id','LIKE', '%' . $Search . '%')
            ->get();
    return view('managetimesheet.show',['activity'=>$Activities]);
        }else{
            \Session::put('Search1', '');

            $Activities = \DB::table('users')
            ->join('activities' , 'activities.user_id' , '=','users.id')
            ->where('users.id',$userid)
            ->get();
            
         // $Activities = Activity::where('user_id',$userid)->get();

          return view('managetimesheet.show',['Activities'=>$Activities]);
    }
}

    return view('auth.login');
    }




    
    public function managereport(Request $request)
    {
        //
        if (Auth::check()){

            if ((Auth::user()->Active) != 'Yes') {
                echo '<script>alert("Your Account Was not Activated, Please Contact The supper Admin User to activate it")</script>';
                Auth::logout();
                return view('auth.login');
            }
            if ((Auth::user()->UserLevel) != 'Admin') {
                echo '<script>alert("You have No permission to Manage Users report")</script>';
                return view('home');
            }
        //$Servers = Activity::where('user_id', Auth::user()->id)->get();
        $Search = $request->input('Search');
        //if(isset($find)){
            if ($Search !=""){
                \Session::put('Search1', $Search);
                $Activities =User::where('id','LIKE', '%' . $Search . '%')
                ->orWhere('fname','LIKE', '%' . $Search . '%')
                ->orWhere('lname','LIKE', '%' . $Search . '%')
            ->get();
    return view('managereport.index',['users'=>$users]);
        }else{
            \Session::put('Search1', '');
          $users = User::all();

        return view('managereport.index',['users'=>$users]);
    }
}

    return view('auth.login');
    }


    public function managereportview(Request $request, $userid)
    {
        //
        if (Auth::check()){

            if ((Auth::user()->Active) != 'Yes') {
                echo '<script>alert("Your Account Was not Activated, Please Contact The supper Admin User to activate it")</script>';
                Auth::logout();
                return view('auth.login');
            }
            if ((Auth::user()->UserLevel) != 'Admin') {
                echo '<script>alert("You have No permission to Manage Users")</script>';
                return view('home');
            }
        
            $Activities = \DB::table('activities')
            ->join('users' , 'activities.user_id' , '=','users.id')
            ->where('activities.user_id',$userid)
            ->get();
            
         // $Activities = Activity::where('user_id',$userid)->get();
         $Activities = Activity::where('user_id',$userid)->get();
         $SumOfDuration = Activity::where('user_id',$userid)->sum('DurationHours');
         $SumOfDuration2 = Noproduct::where('id',$userid)->sum('TotalHour');
         $SumOfDuration3 = Office::where('id',$userid)->sum('TotalHour');               
         $tasks = DB::table('task_reports')->where('task_reports.user_id',$userid)->get();

        if($SumOfDuration + $SumOfDuration2 + $SumOfDuration3 != 0){
         $SumOfDurationperce =($SumOfDuration + $SumOfDuration3)/($SumOfDuration+$SumOfDuration2+$SumOfDuration3)*100;
         $SumOfDuration2perce= $SumOfDuration2/($SumOfDuration+$SumOfDuration2+$SumOfDuration3)*100;
        }else{
            $SumOfDurationperce="0";
            $SumOfDuration2perce="0";
        }

         return view('managereport.show')->with([
        'SumOfDuration'=> $SumOfDuration,
        'SumOfDuration2' => $SumOfDuration2,
        'SumOfDuration3' => $SumOfDuration3,
        'SumOfDurationperce' => $SumOfDurationperce,
        'SumOfDuration2perce' => $SumOfDuration2perce,
        'tasks' => $tasks,
       ]);
       
       
       
    //    with('Activities', $Activities)->with('SumOfDuration', $SumOfDuration)->with('SumOfDuration2', $SumOfDuration2)->with('SumOfDuration3', $SumOfDuration3);
    }
}

    
    







// generating specific assignments report for assigned user
public function managereporta(Request $request)
    {
        //
        if (Auth::check()){

            if ((Auth::user()->Active) != 'Yes') {
                echo '<script>alert("Your Account Was not Activated, Please Contact The supper Admin User to activate it")</script>';
                Auth::logout();
                return view('auth.login');
            }
            if ((Auth::user()->UserLevel) != 'Admin') {
                echo '<script>alert("You have No permission to Manage Users report")</script>';
                return view('home');
            }
        
        $Search = $request->input('Search');
         if ($Search !=""){
                \Session::put('Search1', $Search);
                $Activities =Auditschema::where('id','LIKE', '%' . $Search . '%')
                ->orWhere('AssignmentName','LIKE', '%' . $Search . '%')
            ->get();
    return view('managereporta.index',['auditschemas'=>$auditschemas]);
        }else{
            \Session::put('Search1', '');
            $auditschemas = Auditschema::all();

        return view('managereporta.index',['auditschemas'=>$auditschemas]);
    }
}

    return view('auth.login');
    }



    public function managereportviewa(Request $request, $userid)
    {
            if (Auth::check()){
    
                if ((Auth::user()->Active) != 'Yes') {
                    echo '<script>alert("Your Account Was not Activated, Please Contact The supper Admin User to activate it")</script>';
                    Auth::logout();
                    return view('auth.login');
                }
                if ((Auth::user()->UserLevel) != 'Admin') {
                    echo '<script>alert("You have No permission to Manage Users")</script>';
                    return view('home');
                }
            
                $Activities = \DB::table('activities')
                ->join('auditschemas' , 'activities.task_id' , '=','auditschemas.id')
                ->where('activities.id',$userid)
                ->get();
                
           }    
    }
    
    //************************************************************************************************* */
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_id = Auth::user()->email;
        $tasks = Task::where('UserId', $user_id)->get();

        if(!$tasks){
            $tasks = [
                "AssignmentName"=> "No task"
            ];

            return view('activity.create')->with('tasks', $tasks);
        }

        // dd($tasks);

        return view('activity.create')->with('tasks', $tasks);
    }


    // Return view to assign task to user
    public function assignTask(){
        
        $tasks = App\Auditschema::all();
        $users = App\User::all();
        return view('auditschemas.assignTask')->with([
            'tasks' => $tasks,
            'users' => $users,
        ]);
    }

    // Store tasks assignment
    public function storeAssignment(Request $request) {
        
        $this->validate($request, [
            'user_id'=> 'required',
            'task_id' => 'required',
        ]);

        $user_task = new App\UserTask;
        $user_task->user_id = $request->user_id;
        $user_task->task_id = $request->task_id;
        $user_task->save();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        if (Auth::check()){

        $user_id = Auth::user()->id;
        $atvAssgnName = $request->input('AssignmentName');
        $task = DB::table('tasks')->where('AssignmentName', $atvAssgnName)->first();
        if(!$task){
            return back()->withinput()->with('errors','Assignment name should not be empty!');
        }
        // dd($task->id);

        $Activity=Activity::create([
                 'DayOfWeek'=>$request->input('DayOfWeek'),
                 'ActivityDate'=>$request->input('ActivityDate'),
                 'AssignmentName'=>$atvAssgnName,
                 'SubAssignment'=>$request->input('SubAssignment'),
                 'SubAssignmentTwo'=>$request->input('SubAssignmentTwo'),
                 'SubassignmentThree'=>$request->input('SubassignmentThree'),
                 'DurationHours'=>$request->input('DurationHours'),   
                 'task_id' => $task->id,             
                 'user_id'=> $user_id,
                 ]);

            // check the task from the record
            $taskReport = TaskReport::where('assignmentName', $task->AssignmentName)->first();
            if(!$taskReport)
                return back()->withinput()->with('errors','Assignment is invalid check with ADMIN!');

            $taskReport->assignmentName = $taskReport->assignmentName;
            $taskReport->assignedTime = $taskReport->assignedTime;
            $taskReport->workingHours = $taskReport->workingHours + $request->input('DurationHours');
            $taskReport->save();


        if ($Activity)
            return redirect()->route('activity.index')->with('success','Task Created Successfully');
        }

        return back()->withinput()->with('errors','Error Creating a new Task');
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Activity  $Activity
     * @return \Illuminate\Http\Response
     */
    public function show(Activity $Activity)
    {
        $Activity  = Activity::find($Activity->id);
       return view('activity.show',['Activity'=>$Activity]);

    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Activity  $Activity
     * @return \Illuminate\Http\Response
     */
    public function edit(Activity $Activity)
    {
        //
        $Activity  = Activity::find($Activity->id);
        return view('activity.edit',['Activity'=>$Activity]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Activity  $Activity
     * @return \Illuminate\Http\Response
     */
 
    public function update(Request $request, Activity $Activity)
    {
        // save data
        $ActivityUpdate=Activity::where('id', $Activity->id)
                              ->update([
                                'DayOfWeek'=>$request->input('DayOfWeek'),
                                'ActivityDate'=>$request->input('ActivityDate'),
                                'AssignmentName'=>$request->input('AssignmentName'),
                                'SubAssignment'=>$request->input('SubAssignment'),
                                'SubAssignmentTwo'=>$request->input('SubAssignmentTwo'),
                                'SubassignmentThree'=>$request->input('SubassignmentThree'),
                                'DurationHours'=>$request->input('DurationHours'),
                               // 'AssignmentId'=>$request->input('UserId')."_".$request->input('AssignmentDate')."_".$request->input('AssignmentName'),
                            
                                
                            
                                       ]);
if ($ActivityUpdate){
    
          return back()->withinput()->with('success','Updated Successfully');
}

        //redirect
       // return back()->withinput();
       return back()->withinput()->with('errors','Error Updating a Activity');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Activity  $Activity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activity $Activity)
    {
            //
    
              if ((Auth::user()->UserLevel) != 'Admin') {
                    return redirect()->route('activity.index')
                ->with('success','You have No Permision to delete any Information, if you think this is an error Please contact the Super Admin');
                }else{
    
            /*Activity::where('id', $Activity->id)->update(['UpdatedBy'=>auth::user()]);*/
            $findActivity  = Activity::where('ID',$Activity->id);
            if($findActivity ->delete()){
                return redirect()->route('activity.index')
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
public function exportpdf(Activity $Activities)
{
  // Fetch all customers from database
  $Activity = Activity::find($Activities->id);
//echo $Activities->id;
  // Send data to the view using loadView function of PDF facade
    $pdf = \PDF::loadView('Activities.expTopdf', ['Activity'=>$Activity]);

  // Finally, you can download the file using download function
    return $pdf->download('PDFExports.pdf');
}
//*********************************** */ END Export to PDF Functions *************************************

}
