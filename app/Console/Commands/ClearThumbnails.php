<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class ClearThumbnails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'images:clear-thumbnails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clears thumbnails directory "/assets/images/thumbs" ';

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
     * @return mixed
     */
    public function handle()
    {
        $images_path = config('definitions.images_path');
        $success = File::cleanDirectory(public_path("{$images_path}/thumbs"), true);
        if ($success) {
            $this->info('Cache cleared successfully!');
        } else {
            $this->error('Something went wrong!');
        }
    }
}
