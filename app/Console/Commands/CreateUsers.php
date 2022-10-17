<?php

namespace App\Console\Commands;

use App\Jobs\CreateUsersJob;
use Illuminate\Console\Command;

class CreateUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:users {count?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create fake users for development testing. Default (100)';

    /** Default user value */
    private int $default = 10;

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        CreateUsersJob::dispatch($this->argument('count') ?? $this->default);

        $this->info('Users will be added soon');

        return self::SUCCESS;
    }
}
