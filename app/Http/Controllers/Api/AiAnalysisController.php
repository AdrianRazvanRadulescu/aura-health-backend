<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\AiAnalysisService;
use Illuminate\Support\Facades\Validator;

class AiAnalysisController extends Controller
{
    protected $aiAnalysisService;

    public function __construct(AiAnalysisService $aiAnalysisService)
    {
        $this->aiAnalysisService = $aiAnalysisService;
    }

    public function analyze(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'document' => 'required|file|mimes:pdf|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $file = $request->file('document');
        $analysisResult = $this->aiAnalysisService->analyzeDocument($file);

        return response()->json(['analysis' => $analysisResult]);
    }
}