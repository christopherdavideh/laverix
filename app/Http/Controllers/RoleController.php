<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

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
    }
    public function index()
    {
        $roleQuery = Role::query();
        $roleQuery->where('role', 'like', '%'.request('q').'%');
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
    public function store(Request $request)
    {
        /*$role = new Role($request->all());
        $role->save();
        return redirect()->action([RoleController::class, 'index']);*/
        $role = Role::create($request);

        return redirect()->route('roles.show', $role)->with('status', __('Rol has been created successfully.'));
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
    public function update(Request $request, Role $role)
    {
        /*$role = Role::find($id);
        $role->fill($request->all());
        $role->save();
        return redirect()->action([RoleController::class, 'index']);*/
        $roleData = $request->validated();
        $role->update($roletData);

        return redirect()->route('roles.show', $role)->with('status', __('Local has been updated successfully.'));
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
        /*$role = Role::find($id);
        $role->fill($request->status(0));
        $role->save();
        return redirect()->action([RoleController::class, 'index']);*/
        $request->validate();
        $request->status=0;
        $roleData = $request;

        if ($request->update($roletData)) {
            return redirect()->route('roles.index')->with('status', __('Local has been deleted successfully.'));
        }

        return back();
    }
}
