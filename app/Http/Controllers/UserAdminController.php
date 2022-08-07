<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Beneficiary;
use App\Models\Country;
use App\Models\HouseInfo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use DataTables;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Stevebauman\Purify\Facades\Purify;

class UserAdminController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:Show users', ['only' => ['index','userdata']]);
        $this->middleware('permission:Add users', ['only' => ['create', 'store']]);
        $this->middleware('permission:Update users', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Delete users', ['only' => ['destroy','del_user']]);
    }
    function userdata()
    {
     $user = User::with('roles')->select('id', 'name', 'email');
     return Datatables::of($user)
            ->addColumn('action', function($user){
                return  '<a href="users/'.$user->id.'/edit" class="btn btn-xs btn-primary edit" id="'.$user->id.'"><i class="bi bi-pencil-square"></i> Edit</a> <a href="user/d/'.$user->id.'" . class="btn btn-xs btn-danger delete" id="'.$user->id.'"><i class="bi bi-backspace-reverse-fill"></i> Delete</a>';
            })
            ->addColumn('Role', function($user){
                $role = isset($user->roles()->get()[0]->name) ? $user->roles()->get()[0]->name : '___________';
                return $role;
            })
            ->addColumn('checkbox', '<input type="checkbox" name="user_checkbox[]" class="user_checkbox" value="{{$id}}" />')
            ->rawColumns(['checkbox','action'])
            ->make(true);
    }

    public function index()
    {
        return view('admin.users.index');
    }


    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();
        return view('admin.users.create', compact('roles'));
    }


    public function store(UserRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {


                $input['name']   =  Purify::clean($request->name);
                $input['email']   =  Purify::clean($request->email);
                $input['password'] = Hash::make($request->password);
                $input['roles'] = $request->roles;

                $user = User::create($input);
                $user->assignRole($request->input('roles'));

                if($request->roles[0] == 'Beneficiary'){
                    Beneficiary::create([
                        'user_id' => $user->id,
                    ]);
                     HouseInfo::create([
                        'user_id' => $user->id,
                    ]);

                }
            });
            Session::flash('status', true);
            return redirect()->route('users.index');
        } catch (\Throwable $e) {
            Session::flash('status', false);
            return back();
        }
    }


    public function edit($id)
    {
        $userID = $id;
        $user = User::find($userID);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->first();
        return view('admin.users.edit', compact('user', 'roles', 'userRole'));
    }


    public function update(UserRequest $request, User $user)
    {
        try {
            DB::transaction(function () use ($request, $user) {
                $input['name'] = $request->name;
                $input['email'] = $request->email;
                if (!empty($request->password)) {

                    $input['password'] = Hash::make($request->password);
                }
                $input['roles'] = $request->roles;

                $user->update($input);
                DB::table('model_has_roles')->where('model_id', $user->id)->delete();
                $user->assignRole($request->input('roles'));
            });
            Session::flash('status', true);
            return redirect()->route('users.index');
        } catch (\Throwable $e) {
            Session::flash('status', false);
            return back();
        }
    }

    public function destroy($id)
    {

        try {
            DB::transaction(function () use ($id) {
                $user =  User::findOrfail($id);
                if ($user) {
                    $user->delete();
                }
            });
            Session::flash('status', true);
            return redirect()->route('users.index');

        } catch (\Throwable $e) {
            Session::flash('status', false);
            return back();
        }
    }
    public function del_user($id)
    {

        try {
            DB::transaction(function () use ($id) {
                $user =  User::findOrfail($id);
                if ($user) {
                    $user->delete();
                }
            });
            Session::flash('status', true);
            return redirect()->route('users.index');

        } catch (\Throwable $e) {
            Session::flash('status', false);
            return back();
        }
    }

}


