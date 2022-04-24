<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class StoreData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data:store-in-json';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Stores Data back in json files';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Here we can export the data back using a Resource
        // and put it back in a JSON file
        
        return 0;
    }
}
