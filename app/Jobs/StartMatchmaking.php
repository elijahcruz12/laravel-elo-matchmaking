<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class StartMatchmaking implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // Create InitMatchmaking jobs, delaying each one by 2 seconds for a total of 30 jobs
        for ($i = 0; $i < 30; $i++) {
            InitMatchmaking::dispatch()->onQueue('init')->delay(now()->addSeconds(2 * $i));
        }
    }
}
