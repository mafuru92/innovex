<?php

namespace App\Http\Controllers;
use App\Exports\Dataexport;
use App\Exports\GCPDataexport;
use App\Exports\HSPDataexport;
use App\Exports\MLDataexport;
use Maatwebsite\Excel\Facades\Excel;
//use App\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuditsController extends Controller
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

            
        return view('auditresource.index');
        }
    return view('auth.login');
    }


//**************************************************************** */

public function gcp_gclp(Request $request)
{
    //
    if (Auth::check()){

        $Search = $request->input('Search');
        //if(isset($find)){
            if ($Search !=""){
                \Session::put('Search1', $Search);
            $Trainings = Training::where('id','LIKE', '%' . $Search . '%')->orWhere('Name','LIKE', '%' . $Search . '%')
            ->orWhere('GCP_GCLP_Status','LIKE', '%' . $Search . '%')
            ->orWhere('GCP_GCLP_StadyDate','LIKE', '%' . $Search . '%')
            ->orWhere('GCP_GCLP_ExpireDate','LIKE', '%' . $Search . '%')
            ->orWhere('GCP_GCLP_ReminderDate','LIKE', '%' . $Search . '%')
            ->orWhere('GCP_GCLP_Notification','LIKE', '%' . $Search . '%')
            ->orderBy('name')
            ->get();
    return view('trainings.gcp_gclp',['Trainings'=>$Trainings]);
        }else{
            \Session::put('Search1', '');
    $Trainings = Training::where('id','!=',0)->orderBy('name')->get();
    return view('trainings.gcp_gclp',['Trainings'=>$Trainings]);
    //return view('approvalinfors.index');
}
    }
return view('auth.login');
}
//************************************************************************************************* */

//**************************************************************** */

public function hsp(Request $request)
{
    if (Auth::check()){


        $Search = $request->input('Search');
        //if(isset($find)){
            if ($Search !=""){
                \Session::put('Search1', $Search);
            $Trainings = Training::where('id','LIKE', '%' . $Search . '%')
            ->orWhere('Name','LIKE', '%' . $Search . '%')
            ->orWhere('HSP_Status','LIKE', '%' . $Search . '%')
            ->orWhere('HSP_StadyDate','LIKE', '%' . $Search . '%')
            ->orWhere('HSP_ReminderDate','LIKE', '%' . $Search . '%')
            ->orderBy('name')
            ->get();
    return view('trainings.hsp',['Trainings'=>$Trainings]);
        }else{
            \Session::put('Search1', '');
        $Trainings = Training::where('id','!=',0)->orderBy('name')->get();
        return view('trainings.hsp',['Trainings'=>$Trainings]);
        //return view('approvalinfors.index');
}
    }
return view('auth.login');
}


public function ml(Request $request)
{
    if (Auth::check()){


        $Search = $request->input('Search');
            if ($Search !=""){
                \Session::put('Search1', $Search);
            $Trainings = Training::where('id','LIKE', '%' . $Search . '%')
            ->orWhere('Name','LIKE', '%' . $Search . '%')
            ->orWhere('ML_Status','LIKE', '%' . $Search . '%')
            ->orWhere('ML_StadyDate','LIKE', '%' . $Search . '%')
            ->orWhere('ML_ReminderDate','LIKE', '%' . $Search . '%')
            ->orderBy('name')
            ->get();
    return view('trainings.ml',['Trainings'=>$Trainings]);
        }else{
            \Session::put('Search1', '');
        $Trainings = Training::where('id','!=',0)->orderBy('name')->get();
        return view('trainings.ml',['Trainings'=>$Trainings]);
      
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
        //
       // dump($project->id);
        return view('trainings.create');
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
        if (auth::check()){
        $Training=Training::create([
            
                               'Name'=>$request->input('Name'),
                                'GCP_GCLP_Status'=>$request->input('GCP_GCLP_Status'),
                                'GCP_GCLP_StadyDate'=>$request->input('GCP_GCLP_StadyDate'),
                                'GCP_GCLP_ExpireDate'=>$request->input('GCP_GCLP_ExpireDate'),
                                'GCP_GCLP_ReminderDate'=>$request->input('GCP_GCLP_ReminderDate'),
                                'GCP_GCLP_Notification'=>$request->input('GCP_GCLP_Notification'),
                                'HSP_Status'=>$request->input('HSP_Status'),
                                'HSP_StadyDate'=>$request->input('HSP_StadyDate'),
                                'HSP_ExpireDate'=>$request->input('HSP_ExpireDate'),
                                'HSP_ReminderDate'=>$request->input('HSP_ReminderDate'),
                                'HSP_Notification'=>$request->input('HSP_Notification'),

                                'ML_Status'=>$request->input('ML_Status'),
                                'ML_StadyDate'=>$request->input('ML_StadyDate'),
                                'ML_ExpireDate'=>$request->input('ML_ExpireDate'),
                                'ML_ReminderDate'=>$request->input('ML_ReminderDate'),
                                'ML_Notification'=>$request->input('ML_Notification'),
                                'UpdatedBy'=>auth::user()->email
                 ]);
if ($Training){

    return back()->withinput()
    ->with('success',' Record Saved Successfully');


    }
  
}
return back()->withinput()->with('errors','Error occured while saving the record');
}

    /**
     * Display the specified resource.
     *
     * @param  \App\project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
        $project  = Project::find($project->id);
        return view('projects.show',['project'=>$project]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Training $Training)
    {
        //
        $Training  = Training::find($Training->id);
        return view('trainings.edit',['Training'=>$Training]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Training $Training)
    {
        $Training=Training::where('id', $Training->id)
                              ->update([
                                'Name'=>$request->input('Name'),
                                'GCP_GCLP_Status'=>$request->input('GCP_GCLP_Status'),
                                'GCP_GCLP_StadyDate'=>$request->input('GCP_GCLP_StadyDate'),
                                'GCP_GCLP_ExpireDate'=>$request->input('GCP_GCLP_ExpireDate'),
                                'GCP_GCLP_ReminderDate'=>$request->input('GCP_GCLP_ReminderDate'),
                                'GCP_GCLP_Notification'=>$request->input('GCP_GCLP_Notification'),
                                'HSP_Status'=>$request->input('HSP_Status'),
                                'HSP_StadyDate'=>$request->input('HSP_StadyDate'),
                                'HSP_ExpireDate'=>$request->input('HSP_ExpireDate'),
                                'HSP_ReminderDate'=>$request->input('HSP_ReminderDate'),
                                'HSP_Notification'=>$request->input('HSP_Notification'),
                                'ML_Status'=>$request->input('ML_Status'),
                                'ML_StadyDate'=>$request->input('ML_StadyDate'),
                                'ML_ExpireDate'=>$request->input('ML_ExpireDate'),
                                'ML_ReminderDate'=>$request->input('ML_ReminderDate'),
                                'ML_Notification'=>$request->input('ML_Notification'),
                                 'UpdatedBy'=>auth::user()->email
                               
                                       ]);
if ($Training){

    return back()->withinput()
            ->with('success','Updated Successfully');
}

        //redirect
       // return back()->withinput();
       return back()->withinput()->with('errors','Error Updating');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(project $project)
    {
        //
        $findproject  = Project::find($project->id);
        if($findproject->delete()){
            return redirect()->route('projects.index')
            ->with('success','project Updated Successfully');
        }
        
        return back()->withinput()->with('error','project Could not be Deleted');
    }
//*********************************** */ Export to excel Functions *****************************************************
    public function export() 
    {
        return Excel::download(new Dataexport, 'Dataexport.xlsx');
    }

    public function GCPexport() 
    {
        
        return Excel::download(new GCPDataexport, 'GCPexport.xlsx');
    }

    public function HSPexport() 
    {
        
        return Excel::download(new HSPDataexport, 'HSPexport.xlsx');

    }

 public function MLexport() 
    {
        
        return Excel::download(new MLDataexport, 'MLexport.xlsx');

    }



//*********************************** * END Export to excel Functions*****************************************************

}
