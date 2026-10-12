<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::all()->groupBy('group');
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $data = $request->except(['_token', 'home_hero_image_file']);

        // Handle Banner Image File Upload if provided
        if ($request->hasFile('home_hero_image_file')) {
            $file = $request->file('home_hero_image_file');
            $filename = 'hero_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/hero'), $filename);
            $data['home_hero_image'] = asset('uploads/hero/' . $filename);
        }

        foreach ($data as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        // Clear global cache so homepage and entire app updates instantly
        Cache::forget('site_settings');

        return redirect()->back()->with('success', 'Settings & Homepage Banner updated successfully.');
    }
}
