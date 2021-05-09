<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\User;
use App\Models\MachineRequest;
use Illuminate\Console\Command;
use App\Mail\MachineRequestSent;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class MachineRequestAutoSendLink extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'machine-request:send-link';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Resend machine request link email to not approved machine request 1 week before installation date';

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
        $machineRequests = MachineRequest::where('status', MachineRequest::STATUS['pending'])
            ->where(DB::raw('DATE_SUB(installation_date,INTERVAL 7 DAY)'),'=',Carbon::now()->format('Y-m-d'))
            ->get();
            
        foreach($machineRequests as $machineRequest) {
            $cc = $machineRequest->cc_user_id;
            $cc_emails[] = User::find($cc)->pluck('email');

            Mail::to($machineRequest->technician->email)
                ->cc($cc_emails[0])    
                ->queue(new MachineRequestSent($machineRequest));
        }
    }
}
