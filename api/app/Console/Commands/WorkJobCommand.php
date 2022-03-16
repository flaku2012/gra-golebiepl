<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

Use \Carbon\Carbon;
use App\Models\User\Work;
use App\Models\User;

class WorkJobCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'workjob:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Work job CRON';

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
        $time_now = Carbon::now()->timestamp;
        $work_array = Work::get();

        foreach ($work_array as $work_single) 
        {           
            //sprawdza czy aktualny czas jest większy niż zaplanowany, jeżeli tak to
            if( $time_now >= $work_single->end_time_of_work)
            {
                $gettt = User::find( $work_single->user_id );
                if( $gettt != null )
                {
                    //aktualizacja danych użytkownika
                    $update_user = User::find( $work_single->user_id );
                    $update_user->money += $work_single->work_salary;
                    $update_user->save();

                    //aktualizacja wpisu w tabeli pracy
                    $delete_work = Work::where( 'id', $work_single->id )->first();
                    $delete_work->delete();
                }              

            }

        }

        return false;
    }
}
