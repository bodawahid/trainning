<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class expiration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'User Expires';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'User Expiration after 5 minutes ';

    /**
     * Execute the console command. here we will write the code to handle it .
     */
    public function handle()
    {
        //update the user_expiration to 1 . 
        User::query()->update(['expires' => 0]);
    }
}
