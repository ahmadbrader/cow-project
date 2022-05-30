<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;

class PermissionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

     public function index()
     {
        $data['roles'] = Role::all();
        return view('admin.permission.index', $data);
     }

     public function edit(Request $request, $id)
     {
        $user = User::find($id);
        if ($request->name)
        {
           $permission = Permission::where('id', $request->name)->first();
           $user->givePermissionTo($permission);
        }
        $data['my_permission'] = $user->getAllPermissions()->pluck('id')->toArray();
        $data['permissions'] = Permission::whereNotIn('id', $data['my_permission'])->get();
        $data['my_permission'] = $user->getAllPermissions();
        $data['user'] = $user;
        return view('admin.permission.edit-permission-role', $data);
        
     }

     public function add()
     {
        return view('admin.permission.add');
     }

     public function save(Request $request)
     {
         $permission = Permission::firstOrCreate(['name' => $request->name]);
         return back();
     }
}
