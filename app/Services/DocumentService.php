<?php

namespace App\Services;

use App\Jobs\DocumentJob;

class DocumentService
{
  public function sendToQueue()
  {

    $file = file_get_contents('../storage/app/files/2023-03-28.json');
    $documentFile = json_decode($file, true);

    foreach ($documentFile['documentos'] as $document) {
      dispatch(new DocumentJob($document))->delay(now()->addSeconds(1));
    }
  }
}
