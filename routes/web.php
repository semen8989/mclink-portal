<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WiiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FetchController;
use App\Http\Controllers\PolicyController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\HolidayController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HandbookController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\KpiReportController;
use App\Http\Controllers\SalesLeadController;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\HrCalendarController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\KpiMaingoalController;
use App\Http\Controllers\KpiVariableController;
use App\Http\Controllers\OfficeShiftController;
use App\Http\Controllers\RecruitmentController;
use App\Http\Controllers\ServiceFormController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\KpiObjectiveController;
use App\Http\Controllers\Auth\TwoFactorController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\MachineRequestController;
use App\Http\Controllers\AcknowledgementFormController;

/**
 * Authentication Routes
 */
Auth::routes(['register' => false]);

/**
 * Authenticated Routes
 */
Route::middleware(['auth'])->group(function () {
    // Dashboard / Newsletter Route
    Route::get('/',[App\Http\Controllers\HomeController::class, 'index'])->name('home');
    //Newsletter
    Route::resource('newsletter',NewsletterController::class)->only(['index','show']);
    // Profile
    Route::resource('profile', ProfileController::class)->only(['index', 'update']);
    
    // Change password
    Route::resource('change-password', ChangePasswordController::class)->only(['update']);

    // Setting
    Route::resource('setting', SettingController::class)->only(['index', 'update']);
    Route::post('/setting/auth/2fa', [SettingController::class, 'authTwoFactor'])->name('setting.auth.2fa');

    // Service Report Routes
    Route::prefix('service-forms')->group(function () {
        Route::get('/', [ServiceFormController::class, 'index'])->name('service.form.index');
        Route::get('/create', [ServiceFormController::class, 'create'])->name('service.form.create');
        Route::post('/', [ServiceFormController::class, 'store'])->name('service.form.store');
        Route::get('/{serviceReport:csr_no}', [ServiceFormController::class, 'show'])->name('service.form.show');
        Route::get('/{serviceReport:csr_no}/edit', [ServiceFormController::class, 'edit'])->name('service.form.edit');
        Route::put('/{serviceReport:csr_no}', [ServiceFormController::class, 'update'])->name('service.form.update');
        Route::delete('/{serviceReport:csr_no}', [ServiceFormController::class, 'destroy'])->name('service.form.destroy');

        Route::get('/{serviceReport:csr_no}/download', [ServiceFormController::class, 'download'])->name('service.form.download');
    });

    // OKR Routes
    Route::prefix('performance/okr/kpi')->group(function () {
        // KPI Maingoal Routes
        Route::resource('maingoals', KpiMaingoalController::class)
            ->parameters(['maingoals' => 'kpiMain'])
            ->names('okr.kpi.maingoals');
        // KPI Variable Routes
        Route::resource('variables', KpiVariableController::class)
            ->parameters(['variables' => 'kpiVariable'])
            ->names('okr.kpi.variables');
        // KPI Objectives Routes
        // Disabled KPI Objectives for now
        // Route::resource('objectives', KpiObjectiveController::class)
        //     ->parameters(['objectives' => 'kpiObjective'])
        //     ->names('okr.kpi.objectives');
    });

    // KPI Report Routes
    Route::prefix('performance')->group(function () {
        Route::resource('kpi-reports', KpiReportController::class)->only(['index']);
        Route::get('kpi-reports/download', [KpiReportController::class, 'download'])->name('kpi-reports.download');
    });
    
    // Organizations
    Route::prefix('organizations')->group(function () {
        Route::resources([
            'companies' => CompanyController::class,
            'departments' => DepartmentController::class,
            'designations' => DesignationController::class,
            'announcements' => AnnouncementController::class,
            'policies' => PolicyController::class,
            'holidays' => HolidayController::class,
            'locations' => LocationController::class,
            'office-shifts' => OfficeShiftController::class,
            'expenses' => ExpenseController::class
        ]); 
    });
    // Ajax Routes
    Route::prefix('get')->group(function () {
        // Customer Route
        Route::get('/customers/typeahead', [CustomerController::class, 'get'])->name('get.customers');

        // User Route
        Route::get('/engineers/typeahead', [UserController::class, 'getEngineers'])->name('get.engineers');

        // KPI Main Rating Route
        Route::get('/okr/kpi/maingoals/{kpiMain}/rating', [KpiMaingoalController::class, 'getRating'])->name('get.kpi.main.rating');

        // KPI Variable Rating Route
        Route::get('/okr/kpi/variables/{kpiVariable}/rating', [KpiVariableController::class, 'getRating'])->name('get.kpi.variable.rating');

        // KPI Objective Rating Route
        // Disabled KPI Objectives for now
        // Route::get('/okr/kpi/objectives/{kpiObjective}/rating', [KpiObjectiveController::class, 'getRating'])->name('get.kpi.objective.rating');
    });

    //Basic Routes
    Route::post('/fetch-department', [FetchController::class,'fetchDepartment'])->name('fetch_department');
    Route::post('/fetch-user', [FetchController::class,'fetchUser'])->name('fetch_user');
    Route::get('/expenses/downloadFile/{expense}', [ExpenseController::class,'downloadFile'])->name('downloadFile');
    Route::get('/fetch-applicant',[RecruitmentController::class, 'getListData'])->name('fetch_applicant');
    
    //Sales
    Route::prefix('sales')->group(function (){
        //Machine Request
        Route::prefix('machine-request')->group(function (){
            //Create request form
            Route::get('/create-request',[MachineRequestController::class, 'create'])->name('machine_request.create');
            Route::post('/store',[MachineRequestController::class, 'store'])->name('machine_request.store');
            //Pending machine request
            Route::prefix('pending')->group(function (){
                Route::get('/',[MachineRequestController::class, 'pendingRequestIndex'])->name('machine_request.pending_index');
                Route::get('/{machineRequest}',[MachineRequestController::class, 'show'])->name('machine_request.pending');
            });
            //Completed machine request
            Route::prefix('completed')->group(function (){
                Route::get('/',[MachineRequestController::class, 'completedRequestIndex'])->name('machine_request.completed_index');
                Route::get('/{machineRequest}',[MachineRequestController::class, 'show'])->name('machine_request.completed');
            });
            //View request details
            Route::get('/request-details/{machineRequest}',[MachineRequestController::class, 'requestDetails'])->name('machine_request.request_details');
            //mark as completed
            Route::get('/mark/{machineRequest}',[MachineRequestController::class, 'mark'])->name('machine_request.mark');
        });
        //Sales Lead
        Route::prefix('sales-lead')->group(function (){
            
            Route::get('/',[SalesLeadController::class, 'index'])->name('sales_lead.index');
            Route::get('/create',[SalesLeadController::class, 'create'])->name('sales_lead.create');
            Route::post('/store',[SalesLeadController::class, 'store'])->name('sales_lead.store');
            Route::get('/edit/{salesLead}',[SalesLeadController::class, 'edit'])->name('sales_lead.edit');
            Route::get('/details/{salesLead}',[SalesLeadController::class, 'showLead'])->name('sales_lead.show_lead');
            Route::put('/update/{salesLead}',[SalesLeadController::class, 'update'])->name('sales_lead.update');
            Route::delete('/delete/{salesLead}',[SalesLeadController::class, 'destroy'])->name('sales_lead.destroy');
            //Assign
            Route::prefix('assign')->group(function (){
                Route::get('/',[SalesLeadController::class, 'assignIndex'])->name('sales_lead.assign_index');
                Route::get('/details/{salesLead}',[SalesLeadController::class, 'showAssignedLead'])->name('sales_lead.show_assigned_lead');
                Route::put('/assign-sales-man/{salesLead}',[SalesLeadController::class, 'assignSalesMan'])->name('sales_lead.assign_salesman');
            });
            //Assign To Me
            Route::prefix('assigned-to-me')->group(function (){
                Route::get('/',[SalesLeadController::class, 'assignedToMeIndex'])->name('sales_lead.assigned_to_me_index');
                Route::get('/details/{salesLead}',[SalesLeadController::class, 'assignedToMeDetails'])->name('sales_lead.lead_details');
                Route::put('/update-lead-details/{salesLead}',[SalesLeadController::class, 'updateLeadDetails'])->name('sales_lead.update_lead');
            });
            //Approval
            Route::prefix('approval')->group(function (){
                Route::get('/',[SalesLeadController::class, 'approvalIndex'])->name('sales_lead.approval');
                Route::get('/details/{salesLead}',[SalesLeadController::class, 'approvalDetails'])->name('sales_lead.approval_details');
                Route::put('/approve/{salesLead}',[SalesLeadController::class, 'approve'])->name('sales_lead.approve');
            });

        });
    });
    
    //HR
    Route::prefix('hr')->group(function (){
        //HR Calendar
        Route::prefix('calendar')->group(function (){
            Route::get('/',[HrCalendarController::class, 'index'])->name('hr_calendar');
            //Events
            Route::get('/fetch-events',[HrCalendarController::class,'fetchEvents'])->name('hr_calendar.fetch_events');
            Route::post('/store-event',[HrCalendarController::class, 'storeEvent'])->name('hr_calendar.store_event');
            Route::post('/view-event/{event}',[HrCalendarController::class, 'viewEvent'])->name('hr_calendar.view_event');
            //Holidays
            Route::get('/fetch-holidays',[HrCalendarController::class,'fetchHolidays'])->name('hr_calendar.fetch_holidays');
            Route::post('/store-holiday',[HrCalendarController::class,'storeHoliday'])->name('hr_calendar.store_holiday');
            Route::post('/view-holiday/{holiday}',[HrCalendarController::class, 'viewHoliday'])->name('hr_calendar.view_holiday');
        });
        //Recruitment
        Route::prefix('recruitment')->group(function (){
            Route::get('/',[RecruitmentController::class, 'index'])->name('recruitment.index');  
            Route::get('/{submission_id}/details',[RecruitmentController::class, 'show'])->name('recruitment.show'); 
            
            Route::get('/submit/{submission_id}',[RecruitmentController::class, 'submit'])->name('recruitment.submit');
            Route::post('/custom-upload/{submission_id}',[RecruitmentController::class, 'customUpload'])->name('recruitment.custom_upload');
            Route::get('/download-attachment/{fileName}/{origFilename}',[RecruitmentController::class, 'downloadAttachment'])->name('recruitment.download_attachment');
        });
        //Wii
        Route::prefix('wii')->group(function (){
            //Submit Wii
            Route::get('/',[WiiController::class, 'create'])->name('wii.create');
            Route::post('/store',[WiiController::class, 'store'])->name('wii.store');
            //My Wii
            Route::get('/my-wii',[WiiController::class, 'myWiiIndex'])->name('wii.my_wii');
            //Completed Wii
            Route::get('/completed-wii',[WiiController::class, 'completedWiiIndex'])->name('wii.completed_wii');
            //All Wii - For HR only
            Route::get('/all-wii',[WiiController::class, 'allWiiIndex'])->name('wii.all_wii');
            //Actions
            Route::get('/view-details/{wii}',[WiiController::class, 'show'])->name('wii.show');
            Route::get('/edit/{wii}',[WiiController::class, 'edit'])->name('wii.edit');
            Route::put('/update/{wii}',[WiiController::class, 'update'])->name('wii.update');
            Route::delete('/destroy/{wii}',[WiiController::class, 'destroy'])->name('wii.destroy');
            //Update by Management
            Route::put('/updateStatus/{wii}',[WiiController::class, 'updateStatus'])->name('wii.update_status');
        });

        //Handbook
        Route::prefix('handbook')->group(function (){
            Route::get('/mca-indoctrination',[HandbookController::class, 'indoctrinationIndex'])->name('handbook.mca_indoctrination'); 
            Route::get('/ph-handbook',[HandbookController::class, 'phHandbookIndex'])->name('handbook.ph_handbook');
            Route::get('/ch-handbook',[HandbookController::class, 'chHandbookIndex'])->name('handbook.ch_handbook');
            Route::get('/upload-handbook',[HandbookController::class, 'uploadHandbookIndex'])->name('handbook.upload_handbook');
            Route::post('/upload',[HandbookController::class, 'upload'])->name('handbook.upload');   
        });
    
    });

});

/**
 * Guest Routes
 */
Route::middleware(['guest'])->group(function () { 
    // 2FA routes
    Route::get('/2fa', [TwoFactorController::class, 'showTwoFactorForm'])->name('2fa.form')->middleware('signed');
    Route::post('/2fa', [TwoFactorController::class, 'verifyTwoFactor'])->name('2fa.verify');

    // Acknowledgement Routes
    Route::prefix('service-form/acknowledgement')->group(function () {
        Route::get('/{serviceReport}/sign', [AcknowledgementFormController::class, 'sign'])->name('service.form.acknowledgment.sign');
        Route::post('/{serviceReport}', [AcknowledgementFormController::class, 'store'])->name('service.form.acknowledgment.store');
        Route::get('/feedback', [AcknowledgementFormController::class, 'feedback'])->name('service.form.acknowledgment.feedback');
    });

    Route::prefix('auth')->group(function () {
        Route::get('/google', [SocialiteController::class, 'index'])->name('socialite.index');
        Route::get('/callback', [socialiteController::class, 'callBack']);
    });
    
});

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//
