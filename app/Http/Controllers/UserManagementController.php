<?php

namespace App\Http\Controllers;

use App\Models\UserManagement;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\DB;


class UserManagementController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Index(Request $request)
    {
         $UserM = UserManagement::latest()->get();
        
        if ($request->ajax()) {
            $UserM = DB::table('users')
            ->leftJoin('role_user', 'users.id', '=', 'role_user.user_id')
            ->leftJoin('roles','role_user.role_id','=','roles.id')
            ->select('users.*', 'users.name', 'roles.display_name')
            ->get();
            return Datatables::of($UserM)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-user_id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editUser">Edit</a>';
   
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-user_id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteUser">Delete</a>';
    
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
      

        return view('UserManagement/UserManagement',compact('UserM'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserManagement  $about
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $userM =DB::table('users')
        ->leftJoin('role_user', 'users.id', '=', 'role_user.user_id')
  
        ->find($id);
        return response()->json($userM);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserManagement  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        UserManagement::find($id)->delete();
     
        return response()->json(['success'=>'User deleted successfully.']);
    }
}
