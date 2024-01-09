<?php

namespace App\Http\Controllers;

use App\Models\UserManagement;
use App\Models\role_user;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UserManagementController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Index(Request $request)
    {
        $search = $request->input('search.value');
         $UserM = UserManagement::latest()->get();
        
        if ($request->ajax()) {
           
                $UserM = DB::table('users')
                ->leftJoin('role_user', 'users.id', '=', 'role_user.user_id')
                ->leftJoin('roles', 'role_user.role_id', '=', 'roles.id')
                ->select('users.*', 'users.name', 'roles.display_name')
                ->where(function ($query) use ($search) {
                    $query->where('users.name', 'like', '%' . $search . '%')
                        ->orWhere('users.email', 'like', '%' . $search . '%')
                        ->orWhere('roles.display_name', 'like', '%' . $search . '%');
                })
                ->get();
            return Datatables::of($UserM)
                    ->addIndexColumn()
                    ->addColumn('action', function($row) {
                        $btn = '<div class="btn-group">';
                        $btn .= '<button class="btn btn-secondary btn-sm mb-4 dropdown-toggle dropdown-toggle-no-caret" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">&#8230;</button>'; // Use &#8230; for ellipsis (...)
                        $btn .= '<ul class="dropdown-menu">';
                        $btn .= '<li><a class="dropdown-item editUser" href="javascript:void(0)" data-user_id="'.$row->id.'">Edit</a></li>';
                        $btn .= '<li><a class="dropdown-item deleteUser" href="javascript:void(0)" data-user_id="'.$row->id.'">Delete</a></li>';
                        $btn .= '</ul>';
                        $btn .= '</div>';
                        return $btn;
                    })
                    
                    ->make(true);
        }
      

        return view('dashboard/UserManagement/UserManagement',compact('UserM'));
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $password = $request->input('password');
        
        // Check if a new password is provided
        if (!empty($password)) {
            $hashedPassword = Hash::make($password);
        } else {
            // If the password field is empty, retain the existing password
            $user = UserManagement::find($request->id);
            $hashedPassword = $user->password;
        }
    
        UserManagement::updateOrCreate(['id' => $request->id], [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $hashedPassword,
        ]);
    
        role_user::updateOrCreate(['user_id' => $request->id], [
            'role_id' => $request->role_id,
            'user_id' => $request->id,
            'user_type' => 'App\Models\User'
        ]);
    
        return response()->json(['success' => 'User saved successfully.']);
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserManagement  $about
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $userM = DB::table('users')
        ->leftJoin('role_user', 'users.id', '=', 'role_user.user_id')
        ->find($id);
        return response()->json($userM);
    }

    public function destroy($id)
    {
        // Find the user
        $user = DB::table('users')->find($id);
    
        // Check if the user exists
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }
    
        // Delete the user
        DB::table('users')->where('id', $id)->delete();
    
        // Delete the related record in the role_user table
        DB::table('role_user')->where('user_id', $id)->delete();
    
        return response()->json(['message' => 'User and associated records deleted successfully']);
    }
    
}
