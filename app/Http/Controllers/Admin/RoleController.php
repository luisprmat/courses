<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();

        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();
        $role = new Role;

        return view('admin.roles.create', compact('role', 'permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles',
            'display_name' => 'required',
            'permissions' => 'required|array'
        ], [
            'permissions.required' => 'Debes seleccionar por lo menos un permiso'
        ], [
            'name' => 'identificador',
            'display_name' => 'nombre'
        ]);

        $role = Role::create([
            'name' => $request->name,
            'display_name' => $request->display_name
        ]);

        $role->permissions()->attach($request->permissions);

        return redirect()->route('admin.roles.index')
            ->with('info', 'El rol se creó satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Spatie\Permission\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return view('admin.roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Spatie\Permission\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permissions = Permission::all();

        return view('admin.roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Spatie\Permission\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => ['required', Rule::unique('roles')->ignore($role->id)],
            'display_name' => 'required',
            'permissions' => 'required|array'
        ], [
            'permissions.required' => 'Debes seleccionar por lo menos un permiso'
        ], [
            'name' => 'identificador',
            'display_name' => 'nombre'
        ]);

        $role->update([
            'name' => $request->name,
            'display_name' => $request->display_name
        ]);

        $role->permissions()->sync($request->permissions);

        return redirect()->route('admin.roles.edit', $role)
            ->with('info', 'El rol se actualizó correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Spatie\Permission\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()->route('admin.roles.index')
            ->with('info', 'El rol se eliminó satisfactoriamente');
    }
}
