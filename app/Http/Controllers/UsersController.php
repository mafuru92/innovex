<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
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

            if ((Auth::user()->UserLevel) != 'Admin') {
                echo '<script>alert("You have No permission to Manage Users")</script>';
                return view('home');
            }

            $Search = $request->input('Search');
            if ($Search !=""){
                $users = User::where('id','LIKE', '%' . $Search . '%')->orWhere('fname','LIKE', '%' . $Search . '%')
                ->orWhere('lname','LIKE', '%' . $Search . '%')
                ->orWhere('UserLevel','LIKE', '%' . $Search . '%')
                ->orWhere('Active','LIKE', '%' . $Search . '%')
                ->orWhere('email','LIKE', '%' . $Search . '%')
                ->get();
        return view('users.index',['users'=>$users]);
            }else{
            $users = User::where('id','!=',0)->get();
            return view('users.index',['users'=>$users]);
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
        $user=User::where('id', $user->id)
                              ->update([
                                'fname'=>$request->input('fname'),
                                'lname'=>$request->input('lname'),
                                'UserLevel'=>$request->input('UserLevel'),
                                'Active'=>$request->input('Active'),
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
}
