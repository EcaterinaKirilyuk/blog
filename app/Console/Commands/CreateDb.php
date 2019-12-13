<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CreateDb extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:database';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Database, name of Database will be taken from .env configuration';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        config(["database.connections.mysql.database" => null]);
        DB::statement('CREATE DATABASE '.$_ENV['DB_DATABASE']);
        config(["database.connections.mysql.database" => $_ENV['DB_DATABASE']]);
    }
}
