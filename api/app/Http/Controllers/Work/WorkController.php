<?php

namespace App\Http\Controllers\Work;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use \Carbon\Carbon;

use App\Models\User;
use App\Models\User\Work;

class WorkController extends Controller
{

    public function __construct(){
        $this->middleware(['auth:api']);
    }

//====================================================================================================
//====================================================================================================
//====================================================================================================

    public function start(Request $request)
    {       
           
        $user = Auth()->user();
        $check_in_work = User::find(Auth()->id())->work;
        
        //zmienne z request
        $request_work_time = $request->work_time;
        $request_work_time = (int)$request_work_time;

        switch($request_work_time)
        {
            case 1:
                $work_salary = 20;
                break;
            case 8:
                $work_salary = 160;
                break;
            case 12:
                $work_salary = 240;
                break;
            default:
                $work_salary = 0;
                break;
        }

        // zmienne dot. czasu pracy
        $time_now = Carbon::now();
        $new_time = $time_now->addMinutes($request_work_time)->timestamp;
        
        if( !isset($check_in_work) && $request_work_time !== '' )
        {
            
            $work = new Work;
            $work->user_id = Auth()->id();
            $work->in_work = 1;
            $work->end_time_of_work = $new_time;
            $work->work_salary = $work_salary;
            $work->save();

        }  

    }

//====================================================================================================
//====================================================================================================
//====================================================================================================
    
    public function manual_end()
    {   
        $user = Auth()->user();
        $check_in_work = Work::where( 'user_id', Auth()->id() )->first();
        $check_in_work->delete();

    }

//====================================================================================================
//====================================================================================================
//====================================================================================================

    public function end_time_work()
    {
        
        $get_status_work = Work::where( 'user_id', Auth()->id() )->first();

        // sprawdzenie czy jest w pracy
        if( $get_status_work )
        {
            //aktualizacja salda użytkownika
            $update_user = User::find( Auth()->id() );
            $update_user->money += $get_status_work->work_salary;
            $update_user->save();
        }

        $get_status_work->delete();
        
    }


//====================================================================================================
//====================================================================================================
//====================================================================================================

    public function status()
    {   
        $get_status_work = Work::where( 'user_id', Auth()->id() )->first();

        if( $get_status_work ) {
            return $get_status_work;
        }
    }

//====================================================================================================
//====================================================================================================
//====================================================================================================

    public function verify_work_time_to_cron(){
        info('jako tako działa');
    }

//====================================================================================================
//====================================================================================================
//====================================================================================================

    public function doTestow(Request $request)
    {
        
        

    }

//====================================================================================================
//====================================================================================================
//====================================================================================================

}
