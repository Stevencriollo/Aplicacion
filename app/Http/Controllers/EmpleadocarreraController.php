<?php

namespace App\Http\Controllers;

use App\Models\Empleadocarrera;
use App\Models\Empleado;
use App\Models\Carrera;
use App\Models\Periodo;

use Illuminate\Http\Request;

/**
 * Class EmpleadocarreraController
 * @package App\Http\Controllers
 */
class EmpleadocarreraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleadocarreras = Empleadocarrera::paginate();

        return view('empleadocarrera.index', compact('empleadocarreras'))
            ->with('i', (request()->input('page', 1) - 1) * $empleadocarreras->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empleadocarrera = new Empleadocarrera();
        $empleados = Empleado::where('estado', '!=', 'DESACTIVADO')->pluck('apellidos', 'id');
        $carreras = Carrera::where('estado', '!=', 'DESACTIVADO')->pluck('nombrecarrera', 'id');
        $periodos = Periodo::where('estado', '!=', 'DESACTIVADO')->pluck('nombre', 'id');
        $emailUsuarioActual = auth()->user()->email;
        return view('empleadocarrera.create', compact('empleadocarrera','empleados','carreras','periodos','emailUsuarioActual'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Empleadocarrera::$rules);

        $empleadocarrera = Empleadocarrera::create($request->all());

        return redirect()->route('empleadocarrera.index')
            ->with('success', 'Empleadocarrera created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empleadocarrera = Empleadocarrera::find($id);

        return view('empleadocarrera.show', compact('empleadocarrera'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empleadocarrera = Empleadocarrera::find($id);
        $empleados = Empleado::where('estado', '!=', 'DESACTIVADO')->pluck('apellidos', 'id');
        $carreras = Carrera::where('estado', '!=', 'DESACTIVADO')->pluck('nombrecarrera', 'id');
        $periodos = Periodo::where('estado', '!=', 'DESACTIVADO')->pluck('nombre', 'id');
        $emailUsuarioActual = auth()->user()->email;
        return view('empleadocarrera.edit', compact('empleadocarrera','empleados','carreras','periodos','emailUsuarioActual'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Empleadocarrera $empleadocarrera
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empleadocarrera $empleadocarrera)
    {
        request()->validate(Empleadocarrera::$rules);

        $empleadocarrera->update($request->all());

        return redirect()->route('empleadocarrera.index')
            ->with('success', 'Empleadocarrera updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $empleadocarrera = Empleadocarrera::find($id)->delete();

        return redirect()->route('empleadocarreras.index')
            ->with('success', 'Empleadocarrera deleted successfully');
    }
}
