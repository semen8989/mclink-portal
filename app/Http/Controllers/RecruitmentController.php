<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\RecruitmentInfo;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use App\Traits\RecruitmentStringTrait;

class RecruitmentController extends Controller
{
    use RecruitmentStringTrait;
    
    public function index()
    {
        return view('recruitment.index');
    }

    public function show($submission_id)
    {
        $details = Http::get('https://api.jotform.com/submission/'.$submission_id.'?apiKey='.env('APPLICATION_FORM_API'));
        
        if(!(RecruitmentInfo::where('submission_id', '=', $submission_id)->exists())) {
            
            $recruitmentInfo = new RecruitmentInfo;
            $recruitmentInfo->submission_id = $submission_id;
            $recruitmentInfo->status = 0;
            $recruitmentInfo->save();
            
        }

        return view('recruitment.show',['details'=>$details['content']['answers'],'title' => 'Applicant Information']);
                
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
                }else if(RecruitmentInfo::where('submission_id', '=', $collection['id'])->exists()){
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

}
