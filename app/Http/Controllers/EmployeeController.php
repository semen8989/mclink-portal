<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    /**
     * Fetch the list of active employee with designation.
     *
     * @return \Illuminate\Http\Response
     */
    public function get(Request $request)
    {
        $customers = User::select('id', 'name', 'designation_id')
            ->with('designation:id,designation_name')
            ->where([['name', 'like', '%'.$request->query('search').'%']])
            ->where('id', '!=', Auth::id())
            ->orderBy('name', 'asc')
            ->paginate(10);

        return response()->json($customers);
    }
}
