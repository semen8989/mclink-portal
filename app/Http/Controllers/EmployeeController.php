<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Fetch the list of active employee with designation.
     *
     * @return \Illuminate\Http\Response
     */
    public function get(Request $request)
    {            
        $customers = User::select('id','name', 'designation_id')
            ->with('designation:id,designation_name')         
            ->where([['name', 'like', '%'.$request->query('search').'%']])
            ->orderBy('name', 'asc')
            ->paginate(10);

        return response()->json($customers);
    }
}
