<?php

namespace App\Jobs;

use App\Models\MatchmakingLobby;
use App\Models\MatchmakingUser;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Collection;

class InitMatchmaking implements ShouldQueue
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
        MatchmakingUser::chunk(100, function (Collection $users) {
            foreach($users as $user){
                RunMatchmaking::dispatch($user)->onQueue('run');
            }
        });

        MatchmakingLobby::chunk(100, function (Collection $lobbies) {
            foreach ($lobbies as $lobby){
                FinalizeGame::dispatch($lobby)->onQueue('final');
            }
        });
    }
}
