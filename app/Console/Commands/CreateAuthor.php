<?php

namespace App\Console\Commands;

use App\Services\AuthorsService;
use Illuminate\Console\Command;

class CreateAuthor extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create-author {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    protected $authors_service;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(AuthorsService $authors_service)
    {
        $this->authors_service = $authors_service;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->authors_service->store(
            [
                'name' => $this->argument('name')
            ]
        );
    }
}
