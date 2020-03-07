<?php
use Illuminate\Support\Facades\Session;
namespace App\Http\Controllers;
use App\Exports\AllServers;
use App\Exports\StudiesExtensionDataexport;
use App\Exports\StudiesReportDataexport;
use App\Exports\HSPDataexport;
use Maatwebsite\Excel\Facades\Excel;
use \PDF;
use App\Server;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class ServersController extends Controller
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
        //$Servers = Server::where('user_id', Auth::user()->id)->get();
        $Search = $request->input('Search');
        //if(isset($find)){
            if ($Search !=""){
                \Session::put('Search1', $Search);
                $Servers = Server::where('ServerName','LIKE', '%' . $Search . '%')
                ->orWhere('id','LIKE', '%' . $Search . '%')
            ->get();
    return view('servers.index',['Servers'=>$Servers]);
        }else{
            \Session::put('Search1', '');
          $Servers = Server::where('id','!=',0)->get();

        return view('servers.index',['Servers'=>$Servers]);
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
        //
        return view('servers.create');
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
        $Server=Server::create([
                 'ServerName'=>$request->input('ServerName'),
                 'UpdatedBy'=>auth::user()->email
                 ]);
if ($Server){

    return back()->withinput()->with('success','Server Created Successfully');


    }
  
}
return back()->withinput()->with('errors','Error Creating a new server');
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $Item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $Item)
    {
        //
        $Item  = Item::find($Item->ID);
        return view('servers.show',['Item'=>$Item]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $Item
     * @return \Illuminate\Http\Response
     */
    public function edit(Server $Server)
    {
        //
        $Server  = Server::find($Server->id);
        return view('servers.edit',['Server'=>$Server]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $Item
     * @return \Illuminate\Http\Response
     */
 
    public function update(Request $request, Server $Server)
    {
        // save data
        $ItemUpdate=Server::where('id', $Server->id)
                              ->update([
                                'ServerName'=>$request->input('ServerName'),
                                'UpdatedBy'=>auth::user()->email
                                       ]);
if ($ItemUpdate){

          // return redirect()->route('Items.show',['Item'=>$Item->ID]) ->with('success','Approval infor Updated Successfully');
  return back()->withinput()->with('success','Updated Successfully');
}

        //redirect
       // return back()->withinput();
       return back()->withinput()->with('errors','Error Updating a Item');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $Item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $Item)
    {
        //

          if ((Auth::user()->UserRole) != 'Admin') {
                return redirect()->route('Items.index')
            ->with('success','You have No Permision to delete any Information, if you think this is an error Please contact the Super Admin');
            }else{

        Item::where('ID', $Item->ID)->update(['UpdatedBy'=>auth::user()->email]);
        $findItem  = Item::where('ID',$Item->ID);
        if($findItem->delete()){
            return redirect()->route('Items.index')
            ->with('success','Information Deleted Successfully');
        }
        
        return back()->withinput()->with('error','Item Could not be Deleted');
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
public function exportpdf(Item $Items)
{
  // Fetch all customers from database
  $Item = Item::find($Items->ID);
//echo $Items->ID;
  // Send data to the view using loadView function of PDF facade
    $pdf = \PDF::loadView('Items.expTopdf', ['Item'=>$Item]);

  // Finally, you can download the file using download function
    return $pdf->download('PDFExports.pdf');
}
//*********************************** */ END Export to PDF Functions *************************************

}
