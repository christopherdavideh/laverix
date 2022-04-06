<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
    public function __construct()
    {
        //$this->roles = $roles;
        $this->middleware('auth');
    }
    public function index()
    {
        DB::table('users')
        ->where('id', 1)
        ->update([
            'last_conexion' => date('Y-m-d H:i:s'),
        ]);
        $userQuery = User::query();
        $userQuery->where('names', 'like', '%'.request('q').'%')->orWhere('lastnames', 'like', '%'.request('q').'%')->where('status', '=', 1);
        $users = $userQuery->paginate(2);
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$roleQuery = query();
        $roles = DB::table('roles')->where('status', '=', 1)->get();
        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveUserRequest $request)
    {
        $request->validate([
            'names' => ['required', 'string', 'max:50'],
            'lastnames' => ['required', 'string', 'max:50'],
            'phone' => ['required', 'string', 'max:11'],
            'address' => ['required', 'string', 'max:255'],
            'birth' => ['required', 'date'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'roles' => ['required'],
        ]);
        //$newuser->last_conexion = date('Y-m-d H:i:s');
        $user = User::create([
            'names' => $request->names,
            'lastnames' => $request->lastnames,
            'phone' => $request->phone,
            'address' => $request->address,
            'birth' => $request->birth,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'last_conexion' => date('Y-m-d H:i:s'),
        ]);
        //$roles = $request->get('roles');
        if($user)
        {
            $roles = $request->roles;
            $user_id = User::where('status', '=', 1)->get()->last();
            foreach ($roles as $item){
                $data = [
                    ['user_id'=> intval($user_id->id), 'role_id'=> intval($item), 'created_at'=> date('Y-m-d H:i:s'), 'updated_at'=> date('Y-m-d H:i:s')]
                ];  
                DB::table('user_roles')->insert($data);     
            }
        }
        //DB::table('user_roles')->insert($data);  
        //$user = User::create($newuser);        

        return redirect()->route('users.index')->with('status', __('Usuario creado correctamente.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        /*$user = $this->alumnos->ObtenerRolPorId($id);
        return view('user.detail', ['user' => $user]);*/
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        /*$user = $this->users->ObtenerRolPorId($id);
        return view('user.edit', ['user' => $user]);*/
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SaveUserRequest $request, User $user)
    {
        $request->validate([
            'names' => ['required', 'string', 'max:50'],
            'lastnames' => ['required', 'string', 'max:50'],
            'phone' => ['required', 'string', 'max:11'],
            'address' => ['required', 'string', 'max:255'],
            'birth' => ['required', 'date'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'roles' => ['required'],
        ]);
        $userData = $request;
        $user->update($userData);
        if($user)
        {
            $roles = $request->roles;
            $user_id = $request->id;
            $delete = DB::table('user_roles')->where('user_id', $user_id)->delete();
            foreach ($roles as $item){
                $data = [
                    ['user_id'=> intval($user_id->id), 'role_id'=> intval($item), 'created_at'=> date('Y-m-d H:i:s'), 'updated_at'=> date('Y-m-d H:i:s')]
                ];  
                DB::table('user_roles')->insert($data);     
            }
        }

        return redirect()->route('users.index')->with('status', __('Usuario actualizado corectamente.'));
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
        $delete = DB::table('roles')->where('id', $request->role_id)->update(['status' => 0 ]);
        if($delete)
        {            
            return redirect()->route('roles.index')->with('status', __('Usuario borrado correctamente.'));
        }
    }
}
