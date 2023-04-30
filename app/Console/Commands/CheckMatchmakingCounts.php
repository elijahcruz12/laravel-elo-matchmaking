<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CheckMatchmakingCounts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:counts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        while (true){
            // Clear the console
            system('clear');
            $this->info('Matchmaking users: ' . \App\Models\MatchmakingUser::count());
            $this->info('Matchmaking lobbies: ' . \App\Models\MatchmakingLobby::count());
            $this->info('Finalized lobbies: ' . \App\Models\FinalizedLobby::count());
            sleep(1);
        }
    }
}
