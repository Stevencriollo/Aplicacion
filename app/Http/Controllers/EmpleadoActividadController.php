<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Handler\CurlHandler;

class EmpleadoActividadController extends Controller
{
    private $apiBaseUri = 'https://localhost:44333/api/empleadoactividads';

    public function index()
    {
        $client = $this->createHttpClient();

        try {
            $response = $client->get('/api/empleadoactividads');
            $empleadoActividades = json_decode($response->getBody()->getContents(), true);

            return view('empleadoactividades.index', compact('empleadoActividades'));
        } catch (\Exception $e) {
            // Manejar el error si la solicitud falla
            return back()->with('error', 'Error al obtener los datos');
        }
    }

    public function create()
    {
        return view('empleadoactividades.create');
    }

    public function store(Request $request)
    {
        $client = $this->createHttpClient();

        try {
            $response = $client->post('/api/empleadoactividads', [
                'json' => $request->all()
            ]);

            // Handle the response as needed (e.g., error handling, success messages)

            return redirect()->route('empleadoactividades.index')->with('success', 'Empleado actividad creada exitosamente');
        } catch (\Exception $e) {
            // Manejar el error si la solicitud falla
            return back()->with('error', 'Error al crear la empleado actividad');
        }
    }

    public function show($id)
    {
        $client = $this->createHttpClient();

        try {
            $response = $client->get("/api/empleadoactividads/{$id}");
            $empleadoActividad = json_decode($response->getBody()->getContents(), true);

            return view('empleadoactividades.show', compact('empleadoActividad'));
        } catch (\Exception $e) {
            // Manejar el error si la solicitud falla
            return back()->with('error', 'Error al obtener la empleado actividad');
        }
    }

    public function edit($id)
{
    $client = $this->createHttpClient();

    try {
        $response = $client->get("/api/empleadoactividads/{$id}");
        $empleadoActividad = json_decode($response->getBody()->getContents(), true);
        //conversion del tipo DATETIME A DATE
        $empleadoActividad['fechaInicio'] = \Carbon\Carbon::createFromFormat('Y-m-d\TH:i:s', $empleadoActividad['fechaInicio'])->format('Y-m-d');
        $empleadoActividad['fechafin'] = \Carbon\Carbon::createFromFormat('Y-m-d\TH:i:s', $empleadoActividad['fechafin'])->format('Y-m-d');

        return view('empleadoactividades.edit', compact('empleadoActividad'));
    } catch (\Exception $e) {
        // Manejar el error si la solicitud falla
        return back()->with('error', 'Error al obtener la empleado actividad');
    }
}


public function update(Request $request, $id)
{
    $client = $this->createHttpClient();

    try {
        $response = $client->put("/api/empleadoactividads/{$id}", [
            'json' => $request->all()
        ]);

        // Redirigir de vuelta a la vista de edición con un mensaje de éxito
        
        return redirect()->route('empleadoactividades.index')->with('success', 'Empleado actividad creada exitosamente');
   
    } catch (\Exception $e) {
        // Manejar el error si la solicitud falla
        return back()->with('error', 'Error al actualizar la empleado actividad');
    }
}

    public function destroy($id)
    {
        $client = $this->createHttpClient();

        try {
            $response = $client->delete("/api/empleadoactividads/{$id}");

            // Handle the response as needed (e.g., error handling, success messages)

            return redirect()->route('empleadoactividades.index')->with('success', 'Empleado actividad eliminada exitosamente');
        } catch (\Exception $e) {
            // Manejar el error si la solicitud falla
            return back()->with('error', 'Error al eliminar la empleado actividad');
        }
    }

    // Función para crear el cliente Guzzle HTTP con configuración adecuada
    private function createHttpClient()
    {
        $handlerStack = HandlerStack::create(new CurlHandler());
        $httpClient = new Client([
            'base_uri' => $this->apiBaseUri,
            'handler' => $handlerStack,
            'verify' => env('APP_ENV') === 'local' ? false : true
        ]);

        return $httpClient;
    }
}
