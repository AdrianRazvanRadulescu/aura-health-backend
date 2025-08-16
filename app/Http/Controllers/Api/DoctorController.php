<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DoctorController extends Controller
{
    /**
     * Afișează o listă cu toți medicii.
     */
    public function index()
    {
        return JsonResource::collection(Doctor::all());
    }

    public function appointments(Request $request)
    {
        $doctorProfile = Doctor::where('name', $request->user()->name)->firstOrFail();

        $appointments = Appointment::with('user')
            ->where('doctor_id', $doctorProfile->id)
            ->where('appointment_date', '>=', now())
            ->orderBy('appointment_date', 'asc')
            ->get();

        return JsonResource::collection($appointments);
    }
}