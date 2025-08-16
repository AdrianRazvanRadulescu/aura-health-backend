<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MedicalRecord;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MedicalRecordController extends Controller
{
    public function index(Request $request): JsonResource
    {
        $records = MedicalRecord::with('doctor')
            ->where('user_id', $request->user()->id)
            ->orderBy('issued_date', 'desc')
            ->get();

        return JsonResource::collection($records);
    }
}