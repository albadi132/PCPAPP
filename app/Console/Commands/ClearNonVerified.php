<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Verification;

class ClearNonVerified extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    //protected $signature = 'command:name';
    protected $signature = 'clear:non-verified';

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
        $targets = USER::where('is_verified', '==', 0)->get();
        if ($targets != null) {
            foreach ($targets as $key => $target) {
                if ($target->created_at->addDays(2) <= now()) {
                    User::where(['email' => $target->email])->delete();
                    Verification::where(['email' => $target->email])->delete();
                }
            }
        }
        return 0;
    }
}
