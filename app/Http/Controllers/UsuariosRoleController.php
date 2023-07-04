<?php

namespace App\Http\Controllers;

use App\Models\UsuariosRole;
use Illuminate\Http\Request;

/**
 * Class UsuariosRoleController
 * @package App\Http\Controllers
 */
class UsuariosRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuariosRoles = UsuariosRole::paginate();

        return view('usuarios-role.index', compact('usuariosRoles'))
            ->with('i', (request()->input('page', 1) - 1) * $usuariosRoles->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuariosRole = new UsuariosRole();
        return view('usuarios-role.create', compact('usuariosRole'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(UsuariosRole::$rules);

        $usuariosRole = UsuariosRole::create($request->all());

        return redirect()->route('UsuariosRole.index')
            ->with('success', 'UsuariosRole created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuariosRole = UsuariosRole::find($id);

        return view('usuarios-role.show', compact('usuariosRole'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuariosRole = UsuariosRole::find($id);

        return view('usuarios-role.edit', compact('usuariosRole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  UsuariosRole $usuariosRole
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UsuariosRole $usuariosRole)
    {
        request()->validate(UsuariosRole::$rules);

        $usuariosRole->update($request->all());

        return redirect()->route('UsuariosRole.index')
            ->with('success', 'UsuariosRole updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $usuariosRole = UsuariosRole::find($id)->delete();

        return redirect()->route('usuarios-roles.index')
            ->with('success', 'UsuariosRole deleted successfully');
    }
}
