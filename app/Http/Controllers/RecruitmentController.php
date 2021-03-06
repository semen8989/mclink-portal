<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\RecruitmentInfo;
use Yajra\DataTables\DataTables;
use App\Models\RecruitmentRemark;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use App\Traits\RecruitmentStringTrait;
use App\Models\RecruitmentCustomUpload;
use Illuminate\Support\Facades\Storage;
use App\Mail\RecruitmentNextInterviewer;
use App\Mail\RecruitmentApplicantSelected;

class RecruitmentController extends Controller
{
    use RecruitmentStringTrait;
    
    public function index()
    {
        $title = 'Applicant List';
        return view('recruitment.index',compact('title'));
    }

    public function show($submission_id)
    {

        $details = Http::get('https://api.jotform.com/submission/'.$submission_id.'?apiKey='.env('APPLICATION_FORM_API'));
        
        if(!(RecruitmentInfo::where('submission_id', '=', $submission_id)->exists())) {
            
            $recruitmentInfo = new RecruitmentInfo;
            $recruitmentInfo->submission_id = $submission_id;
            $recruitmentInfo->status = 0;
            $recruitmentInfo->save();
        
        }else{

            $recruitmentInfo = RecruitmentInfo::where('submission_id', '=', $submission_id)->first();

        }

        $remarks = RecruitmentRemark::where('submission_id','=',$submission_id)->get();
        
        $details = $details['content'];
        $title = 'Applicant Information';

        $data = [
            'submission_id' => $submission_id,
            'users' => User::all(),
            'statusArray' => RecruitmentInfo::STATUS,
            'confirmArray' => RecruitmentInfo::CONFIRM,
            'customUploads' => RecruitmentCustomUpload::where('submission_id','=',$submission_id)->get(),
            'remarks' => $remarks,
            'recruitmentInfo' => $recruitmentInfo
        ];
        
        return view('recruitment.show',compact('details','title','data'));
                
    }

    public function getListData()
    {
        $api = Http::get('https://api.jotform.com/form/'.env('APPLICATION_FORM_ID').'/submissions?apiKey='.env('APPLICATION_FORM_API').'&limit=50');
        $collection = array_values($api['content']);

        return DataTables::of($collection)
            ->editColumn('name', function ($collection) {
                return view('components.datatables.show-column', [
                    'showRouteName' => 'recruitment.show',
                    'showRouteSlug' => 'submission_id',
                    'showRouteSlugValue' => $collection['id'],
                    'columnData' => $collection['answers']['129']['prettyFormat']
                ]);
            })->editColumn('position', function ($collection) {
                return $collection['answers']['11']['answer'];
            })->editColumn('gender', function ($collection) {
                return (!empty($collection['answers']['16']['answer'])) ? $collection['answers']['16']['answer'] : '---';
            })->editColumn('date_applied', function ($collection) {
                return $this->dateFormat($collection['created_at']);
            })->editColumn('sort_date', function ($collection) {
                return substr($collection['created_at'],0,10);
            })->editColumn('status', function ($collection) {

                if(!(RecruitmentInfo::where('submission_id','=', $collection['id'])->exists())){
                    $index = 0;
                }else{
                    $index = RecruitmentInfo::where('submission_id', '=', $collection['id'])->first()->status;
                }

                $status = Str::ucfirst(array_search($index, RecruitmentInfo::STATUS));

                if($index == 0){
                    $badgeColor = 'warning';
                }else if($index == 1){
                    $badgeColor = 'info';
                }else if($index == 2){
                    $badgeColor = 'danger';
                }else if($index == 3){
                    $badgeColor = 'primary';
                }else if($index == 4){
                    $badgeColor = 'success';
                }

                return view('components.datatables.status-column', [
                    'columnData' => $status,
                    'badgeColor' => $badgeColor
                ]);

            })->make(true);

    }

    public function submit(Request $request, $submission_id)
    {   
        if($request->remarks != null)
        {
            $remarks = new RecruitmentRemark;
            $remarks->submission_id = $submission_id;
            $remarks->user_id = auth()->user()->id;
            $remarks->remarks = $request->remarks;
            $remarks->save();   
        }
        //Send email base on condition
        $details = Http::get('https://api.jotform.com/submission/'.$submission_id.'?apiKey='.env('APPLICATION_FORM_API'));
        $name = $details['content']['answers']['15']['prettyFormat'];
        $emailData = [
            'submission_id' => $submission_id,
            'name' => $name
        ];
        
        $recruitmentInfo = RecruitmentInfo::where('submission_id','=',$submission_id)->first();
        $recruitmentInfo->status = $request->status;
        
        switch($request->status){
            case 3:
                $recruitmentInfo->interviewer_user_id = $request->interviewer_user_id;
                $recruitmentInfo->number_of_interview = $recruitmentInfo->number_of_interview + 1;

                $recruitmentInfo->save();
                
                $emailData['interviewer'] = $recruitmentInfo->user->name;
                $interviewer_email = $recruitmentInfo->user->email;

                Mail::to($interviewer_email)
                    ->queue(new RecruitmentNextInterviewer($emailData));
                
                break;

            case 4:
                
                if($recruitmentInfo->confirmed == null)
                {
                    Mail::to(auth()->user()->email)
                        ->queue(new RecruitmentApplicantSelected($emailData));
                }

                $recruitmentInfo->confirmed = $request->confirmed;
                $recruitmentInfo->save();
                
                break;
                
            default:
                $recruitmentInfo->save();
            
        }

        
        
        return back()->with('success', 'Applicant Information Updated Successfully!');

    }

    public function customUpload(Request $request,$submission_id)
    {
        if($request->hasFile('custom_upload')){   
            
            foreach ($request->file('custom_upload') as $file) {
                $name = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                
                $storagePath = Storage::putFile('recruitment_files', $file);
                $fileName = basename($storagePath);

                $upload = new RecruitmentCustomUpload;
                $upload->submission_id = $submission_id;
                $upload->orig_filename = $name;
                $upload->file_name = $fileName;
                $upload->save();
                
                return back()->with('success','Custom Files Uploaded Successfully');
            }
            
        }

    }

    public function downloadAttachment($fileName,$origFileName)
    {
        return Storage::disk('public')->download('recruitment_files/'.$fileName,$origFileName);
    }

}
