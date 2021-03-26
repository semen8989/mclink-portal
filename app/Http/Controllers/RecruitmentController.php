<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RecruitmentController extends Controller
{
    public function index()
    {
        $collection = Http::get('https://api.jotform.com/form/'.env('APPLICATION_FORM_ID').'/submissions?apiKey='.env('APPLICATION_FORM_API').'&limit=10');
        return view('recruitment.index',['collection'=>$collection['content']]);
    }
}
