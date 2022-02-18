<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Department;
use Illuminate\Http\Request;

class FetchController extends Controller
{
    public function fetchDepartment(Request $request)
    {
        $value = $request->get('value');
        $data = Company::find($value)->departments;
        echo json_encode($data);
    }

    public function fetchDesignation(Request $request)
    {
        $value = $request->get('value');
        $data = Department::find($value)->designations;
        echo json_encode($data);
    }

    public function fetchUser(Request $request)
    {
        $value = $request->get('value');
        $data = Company::find($value)->company_users;
        echo json_encode($data);
    }
}
