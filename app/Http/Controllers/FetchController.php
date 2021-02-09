<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class FetchController extends Controller
{
    public function fetch_department(Request $request)
    {
        $value = $request->get('value');
        $data = Company::find($value)->departments;
        echo json_encode($data);
    }
}
