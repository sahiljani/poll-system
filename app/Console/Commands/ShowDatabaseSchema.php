<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ShowDatabaseSchema extends Command
{
    protected $signature = 'database:schema';
    protected $description = 'Show all tables and columns in the database';

    public function handle()
    {
        $tables = DB::select('SHOW TABLES');

        foreach ($tables as $table) {
            $tableName = reset($table);

            $columns = DB::select("DESCRIBE $tableName");

            $this->info("Table: $tableName");
            foreach ($columns as $column) {
                $this->line("- $column->Field");
            }
            $this->line('');
        }
    }
}
