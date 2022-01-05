<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use BaconQrCode\Writer;
use Illuminate\Http\Request;
use PragmaRX\Google2FA\Google2FA;
use BaconQrCode\Renderer\ImageRenderer;
use App\Http\Requests\UpdateSettingRequest;
use BaconQrCode\Renderer\Image\ImagickImageBackEnd;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;

class SettingController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $google2fa = new \PragmaRX\Google2FAQRCode\Google2FA();
        $fa = $google2fa->generateSecretKey();
        
        $QR_Image = $google2fa->getQRCodeInline(
            config('app.name'),
            'root@mclinkgroup.com',
            $fa
        );

        // $google2fa = app(Google2FA::class);

        // $g2faUrl = $google2fa->getQRCodeUrl(
        //     config('app.name'),
        //     'root@mclinkgroup.com',
        //     $google2fa->generateSecretKey()
        // );

        // $writer = new Writer(
        //     new ImageRenderer(
        //         new RendererStyle(400),
        //         new ImagickImageBackEnd()
        //     )
        // );

        // $qrcode_image = base64_encode($writer->writeString($g2faUrl));

        $title = __('label.setting.title.form');
        return view('setting.index', ['QR_Image' => $QR_Image]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSettingRequest  $request
     * @param  \App\Models\Setting $setting
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSettingRequest $request, Setting $setting)
    {
        $validated = $request->validated();
        $setting->update($validated);

        return back()->with('success', __('label.setting.response.success'));
    }

    public function authTwoFactor(Request $request)
    {
        dd($request->all());
    }
}
