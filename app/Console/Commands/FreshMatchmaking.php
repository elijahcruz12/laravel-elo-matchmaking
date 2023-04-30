<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class FreshMatchmaking extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mm:fresh';

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
        \App\Models\MatchmakingUser::truncate();
        $this->info('All matchmaking users deleted');
        \App\Models\MatchmakingLobby::truncate();
        $this->info('All matchmaking lobbies deleted');
        \App\Models\FinalizedLobby::truncate();
        $this->info('All finalized lobbies deleted');
    }
}
