<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Fetch the list of active customers.
     *
     * @return \Illuminate\Http\Response
     */
    public function get(Request $request)
    {            
        $customers = Customer::select('id','name','email','address')
            ->withTrashed(false)
            ->where([['name', 'like', '%'.$request->query('search').'%']])
            ->orderBy('name', 'asc')
            ->paginate(10);

        return response()->json($customers);
    }
}
