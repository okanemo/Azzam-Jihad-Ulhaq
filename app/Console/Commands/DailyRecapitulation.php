<?php

namespace App\Console\Commands;

use App\Mail\SendDailyRecapitulation;
use App\models\Account;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class DailyRecapitulation extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:daily-recap';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send daily recapitulation about incomes and expenses';

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
        $users = User::all();

        $users->map( function ($user) {

            if($user->roles[0]->role_name != "administrator")
            {
                $accounts = Account::where('user_id', $user->id)->get();
                $data = NULL;

                $data['start_date'] = date('Y-m-d');
                $data['end_date'] = date('Y-m-d', strtotime($data['start_date'] . ' +1 day'));

                foreach($accounts as $account)
                {
                    $data['income'][$account->currency_code] = $account->income($data['start_date'], $data['end_date']);
                    $data['expenses'][$account->currency_code] = $account->expenses($data['start_date'], $data['end_date']);
                }

                $email = new SendDailyRecapitulation($data);
                Mail::to($user)->send($email);
            }

        });
    }
}
