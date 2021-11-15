<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateSettingRequest;

class SettingController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = __('label.kpi_objective.title.show');
        return view('setting.index', compact('title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSettingRequest  $request
     * @param  \App\Models\User  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSettingRequest $request, User $setting)
    {
        dd('da');
        $validated = $request->validated();
        dd($validated);
        $profile->update($validated);

        return back()->with('success', __('flash.updated_profile'));
    }
}
