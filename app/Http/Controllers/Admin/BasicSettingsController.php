<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BasicSetting;
use Illuminate\Http\Request;

class BasicSettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function updateSettings(Request $request)
    {
        $settings = BasicSetting::first();
        if ($settings) {
            BasicSetting::where('id', $settings->id)->update($request->except('_token'));
        } else {
            BasicSetting::create($request->all());
        }
        $notification = array('message' => 'Settings Updated', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
    public function updatelogo(Request $request)
    {
        if ($request->logo) {
            $logo = 'logo_' . time() . '.' . $request->logo->getClientOriginalExtension();
            $request->logo->move(public_path('uploads/images'), $logo);
            $request['logo'] = $logo;
        }
        if ($request->favicon) {
            $favicon = 'favicon_' . time() . '.' . $request->favicon->getClientOriginalExtension();
            $request->favicon->move(public_path('uploads/images'), $favicon);
            $request['favicon'] = $favicon;
        }
        $settings = BasicSetting::first();
        if ($settings) {
            $settings = $settings;
        } else {
            $settings  = new BasicSetting;
        }
        if ($request->favicon) {
            $settings->favicon = $favicon;
            $file = "Favicon";
        }
        if ($request->logo) {
            $settings->logo = $logo;
            $file = "Logo";
        }
        $settings->save();

        $notification = array('message' => $file . ' Changed successfully', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
