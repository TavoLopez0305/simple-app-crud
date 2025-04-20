<?php

namespace App\Services;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AppointmentService
{
    public function validateAndSanitizeAppointmentData(array $data): array
    {
        $rules = [
            'client_id' => 'required|exists:clients,id',
            'branch_id' => 'required|exists:branches,id',
            'service_id' => 'required|exists:services,id',
            'fecha_hora' => 'required|date_format:Y-m-d H:i:s',
            'estado' => 'nullable|in:pendiente,confirmada,completada,cancelada',
            'notas' => 'nullable|string|max:255',
        ];

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            throw new \Illuminate\Validation\ValidationException($validator);
        }

        // Sanitización básica (puedes agregar más según tus necesidades)
        $sanitizedData = [
            'client_id' => $data['client_id'],
            'branch_id' => $data['branch_id'],
            'service_id' => $data['service_id'],
            'fecha_hora' => $data['fecha_hora'],
            'estado' => $data['estado'] ?? 'pendiente', // Default value if not provided
            'notas' => Str::sanitize($data['notas'] ?? ''), // Ejemplo de sanitización con Str::sanitize (puede que necesites instalar un paquete para esto o usar otra lógica)
        ];

        return $sanitizedData;
    }
}