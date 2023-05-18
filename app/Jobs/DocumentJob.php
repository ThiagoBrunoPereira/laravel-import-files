<?php

namespace App\Jobs;

use App\Models\Document;
use App\Repositories\CategoryRepository;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class DocumentJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private CategoryRepository $categoryRepository;
    private $document;


    /**
     * Create a new job instance.
     */
    public function __construct($document)
    {
        $this->categoryRepository = new CategoryRepository();
        $this->document = $document;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $category = $this->categoryRepository->fetchByName($this->document['categoria']);
        Document::create([
            'title' => $this->document['titulo'],
            'contents' => $this->document['conteudo'],
            'category_id' => $category->id,
        ]);
    }
}
