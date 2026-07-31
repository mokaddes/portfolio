<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        $settings = Setting::getSettings();

        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'portfolio_name'     => 'nullable|string|max:255',
            'portfolio_image'    => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'favicon'            => 'nullable|file|mimes:jpeg,png,jpg,gif,svg,webp,ico|max:1024',
            'seo_image'          => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'meta_title'         => 'nullable|string|max:255',
            'meta_description'   => 'nullable|string',
            'keywords'           => 'nullable|string',
            'is_captcha_enable'  => 'nullable|boolean',
            'captcha_key'        => 'nullable|string|max:255',
            'captcha_secret'     => 'nullable|string|max:255',
            'certificate_title'  => 'nullable|string|max:255',
            'certificate_issuer' => 'nullable|string|max:255',
            'certificate_image'  => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        $settings = Setting::getSettings();

        $data = $request->only([
            'portfolio_name',
            'meta_title',
            'meta_description',
            'keywords',
            'is_captcha_enable',
            'captcha_key',
            'captcha_secret',
            'certificate_title',
            'certificate_issuer',
        ]);
        $data['is_captcha_enable'] = $request->boolean('is_captcha_enable');

        $uploadDir = public_path('images/settings');
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0775, true);
        }

        foreach (['portfolio_image', 'favicon', 'seo_image', 'certificate_image'] as $field) {
            if ($request->hasFile($field)) {
                if ($settings->{$field} && file_exists(public_path($settings->{$field}))) {
                    @unlink(public_path($settings->{$field}));
                }
                $imageName = time() . '-' . $field . '.' . $request->{$field}->extension();
                $request->{$field}->move($uploadDir, $imageName);
                $data[$field] = 'images/settings/' . $imageName;
            }
        }

        $settings->update($data);

        return redirect()->back()->with('success', 'Settings updated successfully.');
    }
}
