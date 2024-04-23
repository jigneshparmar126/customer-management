<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DropTables extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:drop-tables';

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
        try {
            \DB::beginTransaction();

            $colname = 'Tables_in_' . env('DB_DATABASE');

            $tables = \DB::select('SHOW TABLES');

            foreach ($tables as $table) {
                $droplist[] = $table->$colname;
            }

            $droplist = implode(',', $droplist);

            // turn off referential integrity
            \DB::statement('SET FOREIGN_KEY_CHECKS = 0');
            \DB::statement("DROP TABLE $droplist");
            // turn referential integrity back on
            \DB::statement('SET FOREIGN_KEY_CHECKS = 1');

            \DB::commit();

            $this->comment(PHP_EOL . "If no errors showed up, all tables were dropped" . PHP_EOL);

            // Redirect to another view after truncating the database
            return redirect()->back();
            
        } catch (\Exception $e) {
            \DB::rollBack();
            // Handle the exception as needed, e.g., log it or display an error message.
            $this->comment("Error: " . $e->getMessage());
        }
    }

}

