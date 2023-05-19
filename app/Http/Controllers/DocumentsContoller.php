<?php

namespace App\Http\Controllers;

use App\Services\DocumentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentsContoller extends Controller
{
    private $documentService;

    public function __construct(
        DocumentService $documentService
    ) {
        $this->documentService = $documentService;
    }

    public function send(Request $request)
    {
        $document = $request->file('document');
        $name = '2023-03-28.' . $document->extension();
        Storage::putFileAs('files', $document, $name);

        $this->documentService->sendToQueue();
        return redirect()->back()->with('message', 'Arquivo enviado a fila.');
    }
}
