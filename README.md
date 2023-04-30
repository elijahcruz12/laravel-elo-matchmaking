# 1v1 Elo Matchmaking via Laravel Horizon

## Installation

First you'll need to clone the repo.

Then you'll need to copy `.env.example` to `.env` and fill in the mysql database and redis details.

Then you'll need to run `composer install` to install the dependencies.

Then you'll need to run `php artisan migrate` to create the database tables.

Then you'll need to run `php artisan horizon` to start the queue workers.

You'll also need to run `php artisan schedule:work` to start the scheduler.

Then you'll need to run `php artisan serve` to start the web server. You'll need this to access /horizon.

To add players to the queue you'll need to run `php artisan make:users {count} --fresh`. This will make the matchmaking users.

## Requirements

- PHP 81+
- MySQL
- Redis

## How it works

The matchmaking works by running the scheduler every minute. It will then start the `StartMatchmaking` job. This job starts `InitMatchmaking`.

`InitMatchmaking` gets all the current `MatchmakingUsers` and `MatchmakingLobbies` and creates `RunMatchmaking` and `FinalizeGame` jobs, respectively.

`RunMatchmaking` will search the `MatchmakingUsers` for someone with an elo with 10 above and below of that user. If it doesn't find one, it will add 10 more and search again. Repeating this process until it searches 500 above and below in elo. If it still doesn't fine one, it'll return, as a new job will be recreated for that user.

If it does find another user, it'll make a `MatchmakingLobby` and add both users to it.

The `FinalizeMatchmaking` job will take it's `MatchmakingLobby` and create a `FinalizedLobby` from it. It'll then delete the `MatchmakingLobby` and `MatchmakingUsers` from the database.

This allows for the matchmaking to be run in the background via Laravel's queue system. We took advantage of Laravel Horizon to make this easier to view the analytics of it.

## Commands

### Make:Users

`php artisan make:users {count} --fresh`

This command will make the specified amount of users. It will also delete all the current users in the database if you add `--fresh`.

### Check:counts

`php artisan check:counts`

This command will check the counts of the `MatchmakingUsers`, `MatchmakingLobbies`, and `FinalizeMatchmaking`. Then it will output them to the console every second.

### MM:Fresh

`php artisan mm:fresh`

This will reset all three of the tables.

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Contributing

Meanwhile we will not be accepting any pull requests, we will be accepting issues. If you find a bug, please open an issue. If you have a suggestion, please open an issue. If your issue is something we like, you can make a pull request. We will not be accepting any pull requests that are not related to an issue.
