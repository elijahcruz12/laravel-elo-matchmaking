# 1v1 Elo Matchmaking via Laravel Horizon

This is a 1v1 elo matchmaking system made with Laravel Queues and Laravel Horizon. It takes advantage of the queue system as well as the scheduling system. 

## Requirements

- PHP 8.1+
- Composer
- MySQL
- Redis

## Installation

 - Clone the repo.

 - Copy the `.env.example` file to `.env` and fill in the database and redis information.
 
 - Run `composer install` to install the dependencies.

 - Run `php artisan key:generate` to generate the application key.

 - Run `php artisan migrate` to migrate the database. If the database doesn't exist, it'll create it.

## Running

 - Run `php artisan horizon` to start the horizon dashboard.
 - Run `php artisan schedule:work` to start the scheduler.
 - Run `php artisan check:counts` to start the count checker.
 - Run `php artisan make:users {count}` to make the specified amount of users.

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
