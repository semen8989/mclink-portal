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

            $status = 0;
        
        }else{

            $status = RecruitmentInfo::where('submission_id', '=', $submission_id)->first()->status;

        }

        if(RecruitmentRemark::where('submission_id','=',$submission_id)->exists()){
            
            $remarks = RecruitmentRemark::where('submission_id','=',$submission_id)->first()->remarks;
        
        }else{

            $remarks = null;
        
        }

        $details = $details['content']['answers'];
        $title = 'Applicant Information';

        $users = User::all();
        
        return view('recruitment.show',compact('details','submission_id','title','remarks','status','users'));
                
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
                    'columnData' => $collection['answers']['15']['prettyFormat']
                ]);
            })->editColumn('position', function ($collection) {
                return $collection['answers']['11']['answer'];
            })->editColumn('gender', function ($collection) {
                return $collection['answers']['16']['answer'];
            })->editColumn('status', function ($collection) {

                if(!(RecruitmentInfo::where('submission_id', '=', $collection['id'])->exists())){
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
        $request->validate([
            'remarks' => 'required',
        ]);

        if(RecruitmentRemark::where('submission_id', '=', $submission_id)->exists()){
            
            $remarks = RecruitmentRemark::where('submission_id', '=', $submission_id)->first();
            $remarks->remarks = $request->remarks;
            $remarks->save();

        }else{
            
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
                Mail::to(auth()->user()->email)
                    ->queue(new RecruitmentApplicantSelected($emailData));
                
                break;
            
            case 4:
                $interviewer_email = RecruitmentInfo::where('submission_id','=',$submission_id)->first();
                $emailData['interviewer'] = $interviewer_email->user->name;

                Mail::to($interviewer_email->user->email)
                    ->queue(new RecruitmentNextInterviewer($emailData));
                
                $recruitmentInfo->interviewer_user_id = $request->interviewer_user_id;
                
                break;
        }

        $recruitmentInfo->save();
        
        return session()->flash('success', 'Applicant Information Updated Successfully!');

    }

}
