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

class RunMatchmaking implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(public MatchmakingUser $user)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->user->refresh();

        if($this->user->in_lobby) {
            return;
        }

        // We need to search for a user with the same amount of elo as the current user, give or take 10 elo
        $eloRange = 10;

        // Now we search at most 50 times, incrementing the elo range by 10 each time
        for($i = 0; $i < 50; $i++) {
            $user = $this->findUser($eloRange);
            if($user) {
                // We found a user, so we create a lobby and add both users to it
                $lobby = new MatchmakingLobby();
                $lobby->player_one = $this->user->id;
                $lobby->player_two = $user->id;
                $lobby->save();
                $this->user->in_lobby = true;
                $this->user->save();
                $user->in_lobby = true;
                $user->save();
                return;
            }
            $eloRange += 10;
        }

    }

    public function findUser($eloRange)
    {
        return MatchmakingUser::whereNot('id', $this->user->id)
            ->whereBetween('elo', [$this->user->elo - $eloRange, $this->user->elo + $eloRange])
            ->where('in_lobby', false)
            ->first();
    }
}
