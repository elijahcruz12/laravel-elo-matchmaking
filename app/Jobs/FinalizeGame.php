<?php

namespace App\Jobs;

use App\Models\FinalizedLobby;
use App\Models\MatchmakingLobby;
use App\Models\MatchmakingUser;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class FinalizeGame implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(public MatchmakingLobby $lobby)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $game = new FinalizedLobby();
        $game->player_one = $this->lobby->player_one;
        $game->player_two = $this->lobby->player_two;

        $player_one = MatchmakingUser::whereId($this->lobby->player_one)->first();
        $player_two = MatchmakingUser::whereId($this->lobby->player_two)->first();
        $game->player_one_elo = $player_one->elo;
        $game->player_two_elo = $player_two->elo;
        $game->save();

        $this->lobby->delete();
        $player_one->delete();
        $player_two->delete();
    }
}
