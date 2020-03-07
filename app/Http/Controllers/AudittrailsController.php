<?php

namespace App\Http\Controllers;
use App\Exports\AudittrailDataexport;
use App\Arts_audit_trail_all;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
class AudittrailsController extends Controller
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

            if ((Auth::user()->UserActive) != 'Yes') {
                echo '<script>alert("Your Account Was not Activeted, Please Contact The supper Admin User to activate it")</script>';
                Auth::logout();
                return view('auth.login');
            }

            if ((Auth::user()->UserRole) != 'Admin') {
                echo '<script>alert("You have No permission to Manage Users")</script>';
                return view('home');
            }

            $Search = $request->input('Search');
            if ($Search !=""){
                $arts_audit_trails= Arts_audit_trail_all::where('UnikID','LIKE', '%' . $Search . '%')->orWhere('TableName','LIKE', '%' . $Search . '%')
                ->orWhere('ID','LIKE', '%' . $Search . '%')
                ->orWhere('ColumName','LIKE', '%' . $Search . '%')
                ->orWhere('OldValue','LIKE', '%' . $Search . '%')
                ->orWhere('NewValue','LIKE', '%' . $Search . '%')
                ->orderBy('ChangedOn','DESC')
                ->get();
        return view('arts_audit_trail_alls.index',['arts_audit_trails'=>$arts_audit_trails]);
            }else{
            $arts_audit_trails = Arts_audit_trail_all::where('UnikID','!=',0)
                                 ->orderBy('ChangedOn','DESC')
                                ->get();
            return view('arts_audit_trail_alls.index',['arts_audit_trails'=>$arts_audit_trails]);
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $user  = User::find($user->id);
        return view('users.show',['User'=> $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        $User  = User::find($user->id);
        return view('users.edit',['User'=>$User]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user=User::where('ID', $user->id)
                              ->update([
                                'fname'=>$request->input('fname'),
                                'lname'=>$request->input('lname'),
                                'UserRole'=>$request->input('UserRole'),
                                'UserActive'=>$request->input('UserActive'),
                                'email'=>$request->input('email'),
                                       ]);
if ($user){

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
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

//*********************************** */ Export to excel Functions *****************************************************
public function audittrailexport() 
{
    return Excel::download(new AudittrailDataexport, 'AudittrailDataexport.xlsx');
}

//*********************************** * END Export to excel Functions***********************************


}
