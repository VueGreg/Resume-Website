<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class FileDownloadController extends Controller
{
    public function download()
    {
        $filePath = 'pdf/CV_de_GREGORY_WOLFF_-_MEWO.pdf';
        $fileName = 'fCV_de_GREGORY_WOLFF_-_MEWO.pdf';

        if (!file_exists($filePath)) {
            return response()->json(['message' => 'File not found'], 404);
        }

        return Response::download($filePath, $fileName, [
            'Content-Type' => 'application/pdf',
        ]);
    }
}
