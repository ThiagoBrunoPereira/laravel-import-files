<?php

namespace App\Services;

use App\Jobs\DocumentJob;

class DocumentService
{
  public function import()
  {

    $file = file_get_contents('../storage/data/2023-03-28.json');
    $documentFile = json_decode($file, true);

    foreach ($documentFile['documentos'] as $document) {
      dispatch(new DocumentJob($document))->delay(now()->addSeconds(1));
    }
  }
}
