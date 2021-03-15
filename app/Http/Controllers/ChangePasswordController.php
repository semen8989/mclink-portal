<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdatePasswordRequest;

class ChangePasswordController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePasswordRequest $request, User $change_password)
    {
        $validated = $request->validated();

        if ( !Hash::check($validated['current_password'], $change_password->password) ) {
            return back()->with('error', __('flash.you_have_entered_wrong_old_password'));
        }
    }

}
