<?php

namespace App\Http\Controllers\dashboardSettings;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get first settings or create empty instance for the form
        $setting = Settings::first();
        
        return view('dashboard.pages.settings.index', compact('setting'));
    }

      /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'site_title' => 'nullable|string|max:255',
            'site_icon' => 'nullable|string', // Changed to string for URL from media manager
            'site_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'site_footer_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'contact_email' => 'nullable|email',
            'contact_phone' => 'nullable|string|max:20',
            'address' => 'nullable|string'
        ]);

        // Find existing settings or create new instance
        $setting = Settings::firstOrNew();

        // Update text fields
        $setting->site_title = $request->site_title ?: null;
        $setting->contact_email = $request->contact_email ?: null;
        $setting->contact_phone = $request->contact_phone ?: null;
        $setting->address = $request->address ?: null;

        // Handle site icon from media manager (URL)
        if ($request->has('site_icon') && $request->site_icon) {
            $setting->site_icon = $request->site_icon;
        }

        // Handle site icon file upload (from file input - if you want to keep this option)
        if ($request->hasFile('site_icon_file')) {
            // Delete old icon if exists
            if ($setting->site_icon && Storage::disk('public')->exists($setting->site_icon)) {
                Storage::disk('public')->delete($setting->site_icon);
            }
            $iconPath = $request->file('site_icon_file')->store('settings', 'public');
            $setting->site_icon = $iconPath;
        }

        // Handle site logo upload
        if ($request->hasFile('site_logo')) {
            // Delete old logo if exists
            if ($setting->site_logo && Storage::disk('public')->exists($setting->site_logo)) {
                Storage::disk('public')->delete($setting->site_logo);
            }
            $logoPath = $request->file('site_logo')->store('settings', 'public');
            $setting->site_logo = $logoPath;
        }

        // Handle footer logo upload
        if ($request->hasFile('site_footer_logo')) {
            // Delete old footer logo if exists
            if ($setting->site_footer_logo && Storage::disk('public')->exists($setting->site_footer_logo)) {
                Storage::disk('public')->delete($setting->site_footer_logo);
            }
            $footerLogoPath = $request->file('site_footer_logo')->store('settings', 'public');
            $setting->site_footer_logo = $footerLogoPath;
        }

        // Save the settings
        $setting->save();

        return redirect()->route('dashboard.settings.index')->with('success', 'Settings updated successfully!');
    }

    /**
     * Remove the specified image.
     */
    public function removeImage($type)
    {
        $setting = Settings::first();
        
        if ($setting && $setting->$type) {
            Storage::disk('public')->delete($setting->$type);
            $setting->$type = null;
            $setting->save();
        }

        return redirect()->route('dashboard.settings.index')->with('success', ucfirst(str_replace('_', ' ', $type)) . ' removed successfully!');
    }
}
