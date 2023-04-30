<?php

namespace App\Console\Commands;

use App\Models\MatchmakingLobby;
use App\Models\MatchmakingUser;
use Illuminate\Console\Command;

class AddMatchmakingUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:users
    {count : The number of users to create}
    {--fresh : Whether to delete all existing users}
  ';

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
        if($this->option('fresh')){
            MatchmakingUser::truncate();
            $this->info('All matchmaking users deleted');
            MatchmakingLobby::truncate();
            $this->info('All matchmaking lobbies deleted');
        }

        // Create the users
        $count = $this->argument('count');
        $this->output->progressStart($count);
        for($i = 0; $i < $count; $i++){
            $user = new MatchmakingUser();
            $user->name = 'test user ' . $i;
            $user->elo = rand(100, 2000);
            $user->save();
            $this->output->progressAdvance();
        }
        $this->output->progressFinish();

        $this->info('Users created');
    }
}
