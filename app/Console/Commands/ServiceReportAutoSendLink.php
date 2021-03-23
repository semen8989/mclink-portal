<?php

namespace App\Console\Commands;

use App\Events\UnsignedServiceReportFound;
use Carbon\Carbon;
use App\Models\ServiceReport;
use Illuminate\Console\Command;

class ServiceReportAutoSendLink extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'service-report:send-link';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Resend acknowledgement form link email to not signed service report after 48 hours';

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
        $serviceReports = ServiceReport::where('status', ServiceReport::STATUS['sent'])
            ->whereBetween('email_sent_at', [Carbon::parse('-49 hours'), Carbon::parse('-48 hours')])
            ->get();
         
        foreach ($serviceReports as $serviceReport) {
            UnsignedServiceReportFound::dispatch($serviceReport);
        }
    }
}
