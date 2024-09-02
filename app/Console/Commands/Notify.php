<?php

namespace App\Console\Commands;

use App\Mail\NotifyEmail;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class Notify extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Notify users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'this is used to notify users';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $emails = User::pluck('email')->toArray();
        foreach ($emails as $email) {
            Mail::to($email)->send(new NotifyEmail($email));
        }
    }
}
