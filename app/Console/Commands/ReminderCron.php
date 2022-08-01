<?php

namespace App\Console\Commands;

use App\Services\CalculationClass;
use Illuminate\Console\Command;

class ReminderCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reminder:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return int
     */
    public function handle()
    {
        $todoList = new CalculationClass();
        $res = $todoList->sendTodoReminderEmail();
        error_log('-------------run---------------');
    }
}
