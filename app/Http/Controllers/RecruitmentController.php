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
        $i = 1;

        $api = Http::get('https://api.jotform.com/form/'.env('APPLICATION_FORM_ID').'/submissions?apiKey='.env('APPLICATION_FORM_API').'&limit=50');
        $applicants = new Collection;
        $collection = $api['content'];

       foreach($collection as $item) {
           $applicants->push([
                'index' => $i++,
                'name' => $item['answers']['15']['prettyFormat'],
                'position' => $item['answers']['11']['answer'],
                'gender' => $item['answers']['16']['answer']
           ]);
       }

       return DataTables::of($applicants)->make(true);
    }
}
