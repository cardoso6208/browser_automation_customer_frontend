<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Facades\Notification;
use App\Notifications\DBConErrNotification;
use App\Notifications\DBConSuccessNotification;

class CronDBLog extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cron:db_log';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Log database status.';

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
        $currentDate = date('Y-m-d');

        try{
            DB::connection()->getPdo();

            $log_file_path = storage_path().'/logs/db-'.$currentDate.'.log';
            $logFile = array();

            if(file_exists($log_file_path)){
                $logFile = file($log_file_path);
            }

            if(count($logFile) > 0){
                $last_log = $logFile[count($logFile) -1];
                $pre_status = 1;
                if(strpos($last_log, "Database connection error!") > -1){
                    $pre_status = 2;
                }

                if($pre_status == 2){
                    //sending email
                    $admin_email_1 = env('MAIL_ADMIN_1', "");
                    $admin_email_2 = env('MAIL_ADMIN_2', "");

                    if($admin_email_1){
                        $notification = new DBConSuccessNotification();
                        Notification::route('mail', $admin_email_1)->notify($notification);
                    }

                    if($admin_email_2){
                        $notification = new DBConSuccessNotification();
                        Notification::route('mail', $admin_email_2)->notify($notification);
                    }
                }
            }

            Log::channel('db')->info("Database is working fine!");
        } catch(\Exception $e){

            $log_file_path = storage_path().'/logs/db-'.$currentDate.'.log';
            $logFile = array();

            if(file_exists($log_file_path)){
                $logFile = file($log_file_path);
            }

            if(count($logFile) > 0){
                $last_log = $logFile[count($logFile) -1];
                $pre_status = 1;
                if(strpos($last_log, "Database connection error!") > -1){
                    $pre_status = 2;
                }

                if($pre_status == 1){
                    //sending email
                    $admin_email_1 = env('MAIL_ADMIN_1', "");
                    $admin_email_2 = env('MAIL_ADMIN_2', "");
        
                    // Mail::send('errors.db_connection', [], function ($message) {
                    //     // $url = url(route('home'));
                    //     $message->to($admin_email)
                    //         ->subject('Urgent: Database Service Interruption Notification');
                    // });

                    if($admin_email_1){
                        $notification = new DBConErrNotification();
                        Notification::route('mail', $admin_email_1)->notify($notification);
                    }

                    if($admin_email_2){
                        $notification = new DBConErrNotification();
                        Notification::route('mail', $admin_email_2)->notify($notification);
                    }
                }
            }

            Log::channel('single')->error('Database connection error: ' . $e->getMessage());
            Log::channel('db')->error('Database connection error!');
        }
        return 0;
    }
}
