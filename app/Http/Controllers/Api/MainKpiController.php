<?php

namespace App\Http\Controllers\Api;

use App\Models\KpiMaingoal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class MainKpiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mains = auth()->user()->mainKpi()->orderBy('id', 'desc')->get();

        return response()->json([
            'success' => true,
            'count' => $mains->count(),
            'data' => $mains
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Validator::make($request->all(), [
            'main_kpi' => 'required|string'
        ]);

        if ($data->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $data->errors()
            ]);
        }

        $main = new KpiMaingoal;
        $main->main_kpi = $request->main_kpi;
        
        if (auth()->user()->mainKpi()->save($main)) {
            return response()->json([
                'success' => true,
                'data' => $main
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'data' => 'Main KPI not created'
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $main = auth()->user()->mainKpi()->find($id);

        if (!$main) {
            return response()->json([
                'success' => false,
                'message' => 'Not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $main
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $main = auth()->user()->mainKpi()->find($id);

        if (!$main) {
            return response()->json([
                'success' => false,
                'message' => 'Main KPI not found'
            ], 404);
        }

        $data = Validator::make($request->all(), [
            'main_kpi' => 'required|string',
            'q1' => 'nullable|string',
            'q2' => 'nullable|string',
            'q3' => 'nullable|string',
            'q4' => 'nullable|string',
            'feedback' => 'nullable|string',
            'status' => 'required|boolean'
        ]);

        if ($data->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $data->errors()
            ]);
        }

        $updated = $main->fill($request->all())->save();
 
        if ($updated) {
            return response()->json([
                'success' => true
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Unable to update Main KPI'
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $main = auth()->user()->mainKpi()->find($id);
 
        if (!$main) {
            return response()->json([
                'success' => false,
                'message' => 'Main KPI not found'
            ], 404);
        }
 
        if ($main->delete()) {
            return response()->json([
                'success' => true
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Unable to delete Main KPI'
            ], 500);
        }
    }
}
