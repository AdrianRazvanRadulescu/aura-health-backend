<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AppointmentController extends Controller
{
    public function index(Request $request): JsonResource
    {
        $appointments = Appointment::with('doctor')
            ->where('user_id', $request->user()->id)
            ->where('appointment_date', '>=', now())
            ->orderBy('appointment_date', 'asc')
            ->get();

        return JsonResource::collection($appointments);
    }

    /**
     * Salvează o programare nouă în baza de date.
     */
    public function store(Request $request): JsonResource
    {
        $validated = $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'appointment_date' => 'required|date|after:now',
        ]);

        $appointment = Appointment::create([
            'user_id' => $request->user()->id,
            'doctor_id' => $validated['doctor_id'],
            'appointment_date' => $validated['appointment_date'],
        ]);

        return new JsonResource($appointment);
    }
}