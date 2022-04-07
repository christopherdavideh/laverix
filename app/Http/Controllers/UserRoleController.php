<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SaveUserRoleRequest;
use App\Models\User;
use App\Models\UserRole;
use DB;

class UserRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $users;
    protected $roles;
    protected $profiles;
    public function __construct()
    {
        //$this->roles = $roles;
        $this->middleware('auth');
        $this->middleware('admin');
    }
    public function index()
    {
        $userQuery = User::query();
        $userQuery->where('status', '=', 1);
        if(request('q') != "" || request('q') != null)
        {
            $userQuery->Where('names', 'like', '%'.request('q').'%')->orWhere('lastnames', 'like', '%'.request('q').'%');
        }
        $profiles = $userQuery->paginate(2);
        return view('profiles.index', compact('profiles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user)
    {
        
        $roles = DB::table('roles')->where('status', '=', 1)->get();
        return view('profiles.create', compact('roles', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveUserRequest $request)
    {
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        
        return view('profiles.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $profile)
    {
       
        $roles = DB::table('roles')->where('status', '=', 1)->get();
        return view('profiles.edit', compact('profile', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SaveUserRoleRequest $request)
    {
        $request->validated();
        $select= DB::table('user_roles')->where('user_id', $request->user_id)->get();
        if($select){
            $update = DB::table('users')->where('id', $request->user_id)->update(['admin' => 0 ]);  
            $count = 0;
            $roles = $request->roles;
            $user_id = $request->user_id;
            foreach ($roles as $item){
                if($item == 1){
                    $count ++;
                }
                $data = [
                    ['user_id'=> intval($user_id), 'role_id'=> intval($item), 'created_at'=> date('Y-m-d H:i:s'), 'updated_at'=> date('Y-m-d H:i:s')]
                ];  
                DB::table('user_roles')->insert($data);     
            }
            if ($count>0){
                $update = DB::table('users')->where('id', $request->user_id)->update(['admin' => 1 ]);
            }
            return redirect()->route('profiles.index')->with('status', __('Roles asignados corectamente.'));
        }else{
            $delete = DB::table('user_roles')->where('user_id', $request->user_id)->delete();
            if($delete)
            {
                $update = DB::table('users')->where('id', $request->user_id)->update(['admin' => 0 ]);  
                $count = 0;
                $roles = $request->roles;
                $user_id = $request->user_id;
                foreach ($roles as $item){
                    if($item == 1){
                        $count ++;
                    }
                    $data = [
                        ['user_id'=> intval($user_id), 'role_id'=> intval($item), 'created_at'=> date('Y-m-d H:i:s'), 'updated_at'=> date('Y-m-d H:i:s')]
                    ];  
                    DB::table('user_roles')->insert($data);     
                }
                if ($count>0){
                    $update = DB::table('users')->where('id', $request->user_id)->update(['admin' => 1 ]);
                }
                return redirect()->route('profiles.index')->with('status', __('Roles asignados corectamente.'));
            }else{
                return redirect()->route('profiles.index')->with('error', __('Roles no se han asignado.'));
            }
        }
        

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, User $user)
    {
        //Borrado Logico
        $delete = DB::table('user_roles')->where('user_id', $request->user_id)->delete();
        if($delete)
        {            
            return redirect()->route('profiles.index')->with('status', __('Usuario borrado correctamente.'));
        }else{
            return redirect()->route('profiles.index')->with('error', __('Usuario sin roles.'));
        }
    }
}
