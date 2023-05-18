<?php

namespace App\Http\Controllers;

use App\Services\DocumentService;


class DocumentsContoller extends Controller
{
    private $documentService;

    public function __construct(
        DocumentService $documentService
    ) {
        $this->documentService = $documentService;
    }

    public function send()
    {
        try {
            $this->documentService->import();
        } catch (\Exception $e) {
            throw ($e);
        }
        return redirect()->back()->with('message', 'Arquivo enviado a fila.');
    }
}
