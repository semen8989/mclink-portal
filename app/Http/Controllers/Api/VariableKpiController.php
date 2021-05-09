<?php

namespace App\Http\Controllers\Api;

use App\Models\KpiVariable;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreKpiVariableRequest;

class VariableKpiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $variables = auth()->user()->variableKpi()->orderBy('id', 'desc')->get();

        return response()->json([
            'success' => true,
            'count' => $variables->count(),
            'data' => $variables
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKpiVariableRequest $request)
    {
        $data = $request->validated();

        $variable = new KpiVariable;
        $variable->variable_kpi = $data['variable_kpi'];
        $variable->variable_quarter = $data['variable_quarter'];
        $variable->variable_year = $data['variable_year'];
        $variable->target_date = $data['target_date'];
        

        if (auth()->user()->variableKpi()->save($variable)) {
            return response()->json([
                'success' => true,
                'data' => $variable
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'data' => 'Variable KPI not created'
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
        $variable = auth()->user()->variableKpi()->find($id);

        if (!$variable) {
            return response()->json([
                'success' => false,
                'message' => 'Not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $variable
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
        $variable = auth()->user()->variableKpi()->find($id);

        if (!$variable) {
            return response()->json([
                'success' => false,
                'message' => 'Variable KPI not found'
            ], 404);
        }

        $data = $request->validate([
            'variable_kpi' => 'bail|required|string',
            'result' => 'bail|nullable',
            'feedback' => 'bail|nullable',
            'target_date' => 'bail|required|date_format:d/m/Y',
            'status' => 'required|digits_between:0,1',
        ]);

        $updated = $variable->fill($data)->save();
 
        if ($updated) {
            return response()->json([
                'success' => true
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Unable to update Variable KPI'
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
        $variable = auth()->user()->variableKpi()->find($id);
 
        if (!$variable) {
            return response()->json([
                'success' => false,
                'message' => 'Variable KPI not found'
            ], 404);
        }
 
        if ($variable->delete()) {
            return response()->json([
                'success' => true
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Unable to delete variable KPI'
            ], 500);
        }
    }
}
