<?php

namespace App\Http\Controllers;
use App\Exports\DrugsDataexport;
use Maatwebsite\Excel\Facades\Excel;
use App\Drug;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DrugsController extends Controller
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

            $Search = $request->input('Search');
            //if(isset($find)){
                if ($Search !=""){
                    \Session::put('Search1', $Search);
                $Drugs = Drug::where('id','LIKE', '%' . $Search . '%')
                ->orWhere('DrugName','LIKE', '%' . $Search . '%')
                ->orWhere('Amount','LIKE', '%' . $Search . '%')
                ->orWhere('Cubic','LIKE', '%' . $Search . '%')
                ->orWhere('Comments','LIKE', '%' . $Search . '%')
                ->orWhere('ExpireDate','LIKE', '%' . $Search . '%')
                ->orWhere('RemainderDate','LIKE', '%' . $Search . '%')
                ->orWhere('Status','LIKE', '%' . $Search . '%')
                ->orWhere('ExpireNotification','LIKE', '%' . $Search . '%')
                ->get();
        return view('drugs.index',['Drugs'=>$Drugs]);
            }else{
                \Session::put('Search1', '');
        $Drugs = Drug::where('id', '!=', 0)->orderBy('DrugName')->get();
       return view('drugs.index',['Drugs'=>$Drugs]);
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
        return view('drugs.create');
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
        $Drug=Drug::create([
            
                               'DrugName'=>$request->input('DrugName'),
                                'Amount'=>$request->input('Amount'),
                                'DefaultNoted'=>$request->input('DefaultNoted'),
                                'Cubic'=>$request->input('Cubic'),
                                'Comments'=>$request->input('Comments'),
                                'ExpireDate'=>$request->input('ExpireDate'),
                                'RemainderDate'=>$request->input('RemainderDate'),
                                'Status'=>$request->input('Status'),
                                'ExpireNotification'=>$request->input('ExpireNotification'),
                                'HSP_Notification'=>$request->input('HSP_Notification'),
                                'Updatedby'=>auth::user()->email
                 ]);
if ($Drug){

     return redirect()->route('drugs.show',['Drug'=>$Drug->id])
    ->with('success','Record Saved Successfully');


   // return back()->withinput()
    //->with('success',' Record Saved Successfully');


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
    public function show(Drug $Drug)
    {
        //
        $project  = Drug::find($Drug->id);
        return view('drugs.show',['Drug'=>$Drug]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Drug $Drug)
    {
        //
        $Training  = Drug::find($Drug->id);
        return view('drugs.edit',['Drug'=>$Drug]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Drug $Drug)
    {
        $Drugs=Drug::where('id', $Drug->id)
                              ->update([
                               'DrugName'=>$request->input('DrugName'),
                                'Amount'=>$request->input('Amount'),
                                'DefaultNoted'=>$request->input('DefaultNoted'),
                                'Cubic'=>$request->input('Cubic'),
                                'Comments'=>$request->input('Comments'),
                                'ExpireDate'=>$request->input('ExpireDate'),
                                'RemainderDate'=>$request->input('RemainderDate'),
                                'Status'=>$request->input('Status'),
                                'ExpireNotification'=>$request->input('ExpireNotification'),
                                'Updatedby'=>auth::user()->email
                               
                                       ]);
if ($Drugs){

    return redirect()->route('drugs.show',['Drug'=>$Drug->id])
    ->with('success','Record Saved Successfully');
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
    public function destroy(Drug $Drug)
    {
     if ((Auth::user()->UserRole) != 'Admin') {
                return redirect()->route('drugs.index')
            ->with('success','You have No Permision to delete any Information, if you think this is an error Please contact the Super Admin');
            }else{
        Drug::where('id', $Drug->id)->update(['UpdatedBy'=>auth::user()->email]);

        $Drug  = Drug::find($Drug->id);
        if($Drug->delete()){
            return redirect()->route('drugs.index')
            ->with('success','Drug Deleted successful!!');
        }
        
        return back()->withinput()->with('error','Drug Could not be Deleted');
    }}


public function exportdrugpdf(Drug $Drug)
{
  // Fetch all customers from database
  $Drug= Drug::find($Drug->id);
 $pdf = \PDF::loadView('drugs.expTopdf', ['Drug'=>$Drug]);
    return $pdf->download('PDFExports.pdf');
}



//*********************************** */ Export to excel Functions *****************************************************
    public function Drugsexport() 
    {
        return Excel::download(new DrugsDataexport, 'DrugsDataexport.xlsx');
    }

    //*********************************** * END Export to excel Functions*****************************************************

}
