<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Spatie\PdfToText\Pdf;
use OpenAI\Laravel\Facades\OpenAI;

class AiAnalysisService
{
    public function analyzeDocument(UploadedFile $file): string
    {
        $text = $this->extractTextFromFile($file);

        if (empty($text)) {
            return 'Nu s-a putut extrage text din documentul furnizat.';
        }

        return $this->getAnalysisFromAI($text);
    }

    private function extractTextFromFIle(UploadedFile $file): string
    {
        try {
            return Pdf::getText($file->getPathname());
        } catch (\Exception $e) {
            report($e);
            return '';
        }
    }

    private function getAnalysisFromAI(string $text): string
    {
        $prompt = "Te rog să analizezi următorul text extras dintr-un document medical și să oferi un sumar concis.
        Identifică principalele diagnostice, tratamente recomandate și orice valori anormale ale analizelor.
        Prezintă informația într-un mod structurat și ușor de înțeles pentru un pacient.
        Textul de analizat este: \n\n" . $text;

        try {
            $result = OpenAI::chat()->create([
                'model' => 'gpt-4o-mini',
                'messages' => [
                    ['role' => 'user', 'content' => $prompt],
                ],
            ]);

            return $result->choices[0]->message->content;
        } catch (\Exception $e) {
            report($e);
            return 'Serviciul de analiză AI nu este disponibil momentan. Vă rugăm să încercați mai târziu.';
        }
    }
}