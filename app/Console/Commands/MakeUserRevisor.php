<?php

namespace App\Console\Commands;


use Illuminate\Console\Command;
use Illuminate\Foundation\Auth\User;


class MakeUserRevisor extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'presto:makeUserRevisor {email}';

    /**
     * The console command description.

     * @var string
     */
    protected $description = 'Rendi un utente revisore';

    /**
     * Execute the console command.
     */


     public function __costruct(){
        parent::__construct();
     }




    public function handle()
    {
        $user = User::where('email', $this->argument('email'))->first();
        if (!$user) {
            $this->error ('utente non trovato');
            return;
        }
        $user->is_revisor =true;
        $user->save();
        $this->info("L'utente {$user->name} é ora un revisore.");
    }
}
