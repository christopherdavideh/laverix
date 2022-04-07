<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SaveRoleRequest;
use App\Models\Role;
use App\Models\User;
use DB;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $roles;
    public function __construct()
    {
        //$this->roles = $roles;
        $this->middleware('auth');
        $this->middleware('admin');
        
    }
    public function index()
    {
        
        $roleQuery = Role::query();
        $roleQuery->where('role', 'like', '%'.request('q').'%')->where('status', '=', 1);
        $roles = $roleQuery->paginate(2);
        
        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveRoleRequest $request)
    {
        /*$role = new Role($request->all());
        $role->save();
        return redirect()->action([RoleController::class, 'index']);*/
        $newRole = $request->validated();
        $role = Role::create($newRole);
        return redirect()->route('roles.index')->with('status', __('Rol creado correctamente.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        /*$role = $this->alumnos->ObtenerRolPorId($id);
        return view('role.detail', ['role' => $role]);*/
        return view('roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        /*$role = $this->roles->ObtenerRolPorId($id);
        return view('role.edit', ['role' => $role]);*/
        return view('roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SaveRoleRequest $request, Role $role)
    {
        /*$role = Role::find($id);
        $role->fill($request->all());
        $role->save();
        return redirect()->action([RoleController::class, 'index']);*/
        $roleData = $request->validated();
        $role->update($roleData);

        return redirect()->route('roles.index')->with('status', __('Rol actualizado correctamente.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Role $role)
    {
        //Borrado Logico
        $delete = DB::table('roles')->where('id', $request->role_id)->update(['status' => 0 ]);
        if($delete)
        {            
            return redirect()->route('roles.index')->with('status', __('Rol borrado correctamente.'));
        }
    }
}
