<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RoleController extends Controller
{
    use HasRoles;
    public function __construct() {
<<<<<<< HEAD
        $this->middleware(['role:admin|user']);
=======
        $this->middleware(['role:pusdalop|trc']);
>>>>>>> 246e1f5fff2a030a4e5e50a240466baa46bd9fb2
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return Inertia::render('Admins/Roles/Index', [
            'roles' => Role::with('permissions')->paginate(5),
            'permissions' => Permission::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
<<<<<<< HEAD
        if (auth()->user()->hasAnyRole(['superAdmin', 'admin'])) {
=======
        if (auth()->user()->hasAnyRole(['super-admin', 'admin'])) {
>>>>>>> 246e1f5fff2a030a4e5e50a240466baa46bd9fb2
            $this->validate($request, [
                'name' => ['required', 'max:25', 'unique:roles'],
                'permissions' => 'required'
            ]);
            $role = Role::create([
                'name' => $request->name,
                'guard_name' => 'web',
            ]);
            if ($request->has('permissions')) {
                $role->givePermissionTo(collect($request->permissions)->pluck('id')->toArray());
            }
            return back();
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role) {
<<<<<<< HEAD
        if (auth()->user()->hasAnyRole(['superAdmin', 'admin'])) {
=======
        if (auth()->user()->hasAnyRole(['super-admin', 'admin'])) {
>>>>>>> 246e1f5fff2a030a4e5e50a240466baa46bd9fb2
            $this->validate($request, [
                'name' => ['required', 'max:25'],
                'permissions' => 'required'
            ]);
            if ($request->has('permissions')) {
                $role->givePermissionTo(collect($request->permissions)->pluck('id')->toArray());
            }
            $role->syncPermissions(collect($request->permissions)->pluck('id')->toArray());
            $role->update(['name' => $request->name]);
            return back();
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role) {
<<<<<<< HEAD
        if (auth()->user()->hasAnyRole(['superAdmin', 'admin'])) {
=======
        if (auth()->user()->hasAnyRole(['super-admin', 'admin'])) {
>>>>>>> 246e1f5fff2a030a4e5e50a240466baa46bd9fb2
            $role->delete();
            return back();
        }
        return back();
    }
}
