<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Traits\RecruitmentStringTrait;

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
}
