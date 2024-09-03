<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;


class MigrateMySQL2 extends Command
{
    protected $signature = 'migrate:mysql2';
    protected $description = 'Run migrations on the mysql2 connection';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        config()->set('database.default', 'mysql2');
        Artisan::call('migrate');
    }
}
