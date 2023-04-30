<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\FinalizedLobby
 *
 * @property int $id
 * @property int $player_one
 * @property int $player_two
 * @property int $player_one_elo
 * @property int $player_two_elo
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|FinalizedLobby newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FinalizedLobby newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FinalizedLobby query()
 * @method static \Illuminate\Database\Eloquent\Builder|FinalizedLobby whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FinalizedLobby whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FinalizedLobby wherePlayerOne($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FinalizedLobby wherePlayerOneElo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FinalizedLobby wherePlayerTwo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FinalizedLobby wherePlayerTwoElo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FinalizedLobby whereUpdatedAt($value)
 */
	class FinalizedLobby extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\MatchmakingLobby
 *
 * @property int $id
 * @property int $player_one
 * @property int $player_two
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|MatchmakingLobby newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MatchmakingLobby newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MatchmakingLobby query()
 * @method static \Illuminate\Database\Eloquent\Builder|MatchmakingLobby whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MatchmakingLobby whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MatchmakingLobby wherePlayerOne($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MatchmakingLobby wherePlayerTwo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MatchmakingLobby whereUpdatedAt($value)
 */
	class MatchmakingLobby extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\MatchmakingUser
 *
 * @property int $id
 * @property string $name
 * @property int $elo
 * @property int $in_lobby
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|MatchmakingUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MatchmakingUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MatchmakingUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|MatchmakingUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MatchmakingUser whereElo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MatchmakingUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MatchmakingUser whereInLobby($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MatchmakingUser whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MatchmakingUser whereUpdatedAt($value)
 */
	class MatchmakingUser extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

