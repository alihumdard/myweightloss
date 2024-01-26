<?php
// app/Http/Controllers/Admin/SettingsController.php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    public function uploadLargeLogo(Request $request)
    {
  
        $request->validate([
            'file1' => 'image|mimes:jpg,jpeg,png|max:2048', 
        ]);

        if ($request->hasFile('file1')) {
            $oldImagePath = Setting::where('type', 'Large Logo')->value('img_url');

      
            $imagePath = $request->file('file1')->store('logos', 'public');


            Setting::updateOrCreate(
                ['type' => 'Large Logo'], 
                [
                    'section' => 'Logo',
                    'img_url' => $imagePath,
                    'type' => 'Large Logo',
                ]
            );

            if ($oldImagePath && Storage::disk('public')->exists($oldImagePath)) {
                Storage::disk('public')->delete($oldImagePath);
            }

            return redirect()->route('admin.setting');
        }


        return redirect()->back()->with('error', 'No image provided.');
    }

    public function uploadMediumLogo(Request $request)
    {

        $request->validate([
            'file2' => 'image|mimes:jpg,jpeg,png|max:2048', 
        ]);


        if ($request->hasFile('file2')) {

            $oldImagePath = Setting::where('type', 'Medium Logo')->value('img_url');


            $imagePath = $request->file('file2')->store('logos', 'public');

      
            Setting::updateOrCreate(
                ['type' => 'Medium Logo'], 
                [
                    'section' => 'Logo',
                    'img_url' => $imagePath,
                    'type' => 'Medium Logo',
                ]
            );


            if ($oldImagePath && Storage::disk('public')->exists($oldImagePath)) {
                Storage::disk('public')->delete($oldImagePath);
            }

            return redirect()->route('admin.setting');
        }
        return redirect()->back()->with('error', 'No image provided.');
    }
    public function uploadSmallLogo(Request $request)
    {

        $request->validate([
            'file3' => 'image|mimes:jpg,jpeg,png|max:2048', 
        ]);


        if ($request->hasFile('file3')) {

            $oldImagePath = Setting::where('type', 'small Logo')->value('img_url');

            
            $imagePath = $request->file('file3')->store('logos', 'public');

        
            Setting::updateOrCreate(
                ['type' => 'small Logo'], 
                [
                    'section' => 'Logo',
                    'img_url' => $imagePath,
                    'type' => 'small Logo',
                ]
            );


            if ($oldImagePath && Storage::disk('public')->exists($oldImagePath)) {
                Storage::disk('public')->delete($oldImagePath);
            }

            return redirect()->route('admin.setting');
        }
   
        return redirect()->back()->with('error', 'No image provided.');
    }
    public function uploadSocialMediaInfo(Request $request)
    {
 
        $request->validate([
            'section' => 'required|string',
            'type' => 'required|string',
            'link' => 'required|url',
            'img_url' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $imagePath = $request->file('img_url')->store('social_icons', 'public');

        Setting::updateOrCreate(
            ['id' => $request->id ?? NULL],
            [
                'section' => $request->section,
                'type'    => $request->type,
                'link'    => $request->link,
                'img_url' => $imagePath,
                'created_by' => Auth::id()
            ]
        );

        return redirect()->route('admin.setting');
    }
}
