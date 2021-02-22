<?php

namespace App\Http\Controllers;

use app\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Fetch the list of active service engineer users.
     *
     * @return \Illuminate\Http\Response
     */
    public function getEngineers(Request $request)
    {            
        $engineers = User::select('id','name')
            ->where([['name', 'like', '%'.$request->query('search').'%']])
            ->orderBy('name', 'asc')
            ->paginate(10);
            
        return response()->json($engineers);
    }
}
