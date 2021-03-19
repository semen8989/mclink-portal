<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class FetchController extends Controller
{
    public function fetchDepartment(Request $request)
    {
        $value = $request->get('value');
        $data = Company::find($value)->departments;
        echo json_encode($data);
    }

    public function fetchUser(Request $request)
    {
        $value = $request->get('value');
        $data = Company::find($value)->company_users;
        echo json_encode($data);
    }
}
