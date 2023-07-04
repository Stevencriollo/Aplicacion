<?php

namespace App\Http\Controllers;

use App\Models\Clirol;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

/**
 * Class ClirolController
 * @package App\Http\Controllers
 */
class ClirolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clirols = Clirol::paginate();

        return view('clirol.index', compact('clirols'))
            ->with('i', (request()->input('page', 1) - 1) * $clirols->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clirol = new Clirol();
        $roles = Role::pluck('rol', 'id');
        $users = User::pluck('username', 'id');
        return view('clirol.create', compact('clirol', 'roles','users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Clirol::$rules);

        $clirol = Clirol::create($request->all());

        return redirect()->route('clirols.index')
            ->with('success', 'Clirol created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $clirol = Clirol::find($id);

        return view('clirol.show', compact('clirol'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clirol = Clirol::find($id);
        $roles = Role::pluck('rol', 'id');
        $users = User::pluck('username', 'id');
        return view('clirol.edit', compact('clirol', 'roles','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Clirol $clirol
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $clirol = Clirol::find($id);
        if ($request->has('estado')) {
            $clirol->estado = $request->estado;
            $clirol->save();
        }

        request()->validate(Clirol::$rules);
        $clirol->update($request->all());

        return redirect()->route('clirols.index')
            ->with('success', 'Cliente_Rol updated successfully');
    }



    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $clirol = Clirol::find($id)->delete();

        return redirect()->route('clirols.index')
            ->with('success', 'Clirol deleted successfully');
    }
}