<?php

namespace App\Http\Controllers\Api;

use App\Models\KpiMaingoal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KpiRatingController extends Controller
{
    public function update(Request $request, $kpiMain)
    {
        $this->validateData($request);

        $segment = $request->segment(3);

        if ($segment === 'mains') {
            $kpiMain = KpiMaingoal::findOrFail($kpiMain);
            return $kpiMain->kpiratings;
        }
        //TODO rating
    }

    private function validateData(Request $request) : array
    {
        return $request->validate([
            'month' => 'required|digits_between:1,12',
            'rating' => 'required|digits_between:1,5',
            'manager_comment' => 'required|string'
        ]);
    }
}
