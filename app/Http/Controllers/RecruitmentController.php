<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use App\Traits\RecruitmentStringTrait;
use Yajra\DataTables\DataTables;

class RecruitmentController extends Controller
{
    use RecruitmentStringTrait;
    
    public function index()
    {
        $collection = Http::get('https://api.jotform.com/form/'.env('APPLICATION_FORM_ID').'/submissions?apiKey='.env('APPLICATION_FORM_API').'&limit=50');
        return view('recruitment.index',['collection'=>$collection['content'], 'title' => 'Recruitment']);
    }

    public function show($submission_id)
    {
        $details = Http::get('https://api.jotform.com/submission/'.$submission_id.'?apiKey='.env('APPLICATION_FORM_API'));
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
            })->editColumn('status', function ($collection){
                return 'On Process';
            })->make(true);
    }
}
