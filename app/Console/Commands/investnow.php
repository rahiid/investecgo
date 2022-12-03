<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use app\User;
use Illuminate\Support\Facades\DB;

class investnow extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'invest:now';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This Commmand will add interest to invest';

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
        DB::table('users')->update([

            'wallet' => DB::raw('(wallet) + ((invest)*0.035)'),

        ]);


    }
}
