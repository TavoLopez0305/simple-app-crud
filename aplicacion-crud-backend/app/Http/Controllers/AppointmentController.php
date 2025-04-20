<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Client;
use App\Models\PotentialClient; // Asegúrate de importar este modelo
use App\Services\AppointmentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator; // Asegúrate de tener Validator importado

class AppointmentController extends Controller
{

    protected $appointmentService;

    public function __construct(AppointmentService $appointmentService)
    {
        $this->appointmentService = $appointmentService;
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appointments = Appointment::all();
        return response()->json($appointments);
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
    public function store(Request $request)
    {
        try {
            $validatedData = $this->appointmentService->validateAndSanitizeAppointmentData($request->all());

            $appointment = Appointment::create($validatedData);

            return response()->json($appointment, 201); // 201 Created
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422); // 422 Unprocessable Entity
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al crear la cita'], 500); // 500 Internal Server Error
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        return response()->json($appointment);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appointment $appointment)
    {
        $rules = [
            'client_id' => 'nullable|exists:clients,id|exists:potential_clients,id',
            'branch_id' => 'nullable|exists:branches,id',
            'service_id' => 'nullable|exists:services,id',
            'fecha_hora' => 'nullable|date_format:Y-m-d H:i:s',
            'estado' => 'nullable|in:pendiente,confirmada,completada,cancelada',
            'notas' => 'nullable|string|max:255',
        ];
    
        $validator = Validator::make($request->all(), $rules);
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
    
        try {
            $appointment->update($request->all());
    
            // Lógica de conversión al completar la cita
            if ($request->input('estado') === 'completada') {
                $potentialClient = PotentialClient::find($appointment->client_id);
    
                if ($potentialClient) {
                    // Crear un nuevo cliente con la información del cliente potencial
                    $client = Client::create([
                        'nombre' => $potentialClient->nombre,
                        'apellidos' => $potentialClient->apellidos,
                        'telefono' => $potentialClient->telefono,
                        'correo' => $potentialClient->correo,
                        // Puedes agregar más campos aquí si los tienes en PotentialClient
                    ]);
    
                    // Actualizar el client_id de la cita para que ahora apunte al cliente activo
                    $appointment->update(['client_id' => $client->id]);
    
                    // Opcional: Eliminar el cliente potencial después de la conversión
                    // $potentialClient->delete();
                }
            }
    
            return response()->json($appointment);
    
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al actualizar la cita'], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        try {
            $appointment->delete();
            return response()->json(['message' => 'Cita eliminada correctamente'], 204); // 204 No Content
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al eliminar la cita'], 500);
        }    }
}
