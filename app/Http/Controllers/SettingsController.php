<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function homepage() {
        $homepage_settings = Setting::where('key', 'home')->first();
        if ($homepage_settings) {
            $homepage = json_decode($homepage_settings->value, true);
        } else {
            $homepage_settings = Setting::create(['key' => 'home', 'value' => "[]"]);
            $homepage = json_decode($homepage_settings, true);
        }
        return view('admin.homepage', compact('homepage', 'homepage_settings'));
    }

    public function homepage_set(Setting $homepage_settings, Request $request) {
        $homepage = json_decode($homepage_settings->value, true);
        if(array_key_exists('header_image', $homepage)) {
            Storage::delete('public/'.$homepage['header_image']);
        }
        if($request->hasFile('img')) {
            $file_url = $request->file('img')->store('public/header-image');
            $file_name = str_replace("public/", "", $file_url);
            $homepage['header_image'] = $file_name;
        }
        $homepage['title_1'] = $request->title_1;
        $homepage['title_2'] = $request->title_2;
        $homepage['title_3'] = $request->title_3;
        $homepage['description_1'] = $request->description_1;
        $homepage['description_2'] = $request->description_2;
        $homepage['description_3'] = $request->description_3;
        $homepage_settings->value = json_encode($homepage);
        $homepage_settings->save();
        return back()->with('success', 'Homepage updated successfully!');
    }

    public function about() {
        $about_settings = Setting::where('key', 'about')->first();
        if ($about_settings) {
            $about = json_decode($about_settings->value, true);
        } else {
            $about_settings = Setting::create(['key' => 'about', 'value' => "[]"]);
            $about = json_decode($about_settings, true);
        }
        return view('admin.about-contact', compact('about', 'about_settings'));
    }

    public function about_set(Setting $about_settings, Request $request) {
        $about = json_decode($about_settings->value, true);
        $about['address'] = $request->address;
        $about['phone'] = $request->phone;
        $about['email'] = $request->email;
        $about['contact_desc'] = $request->contact_desc;
        $about['about'] = $request->about;
        $about_settings->value = json_encode($about);
        $about_settings->save();
        return back()->with('success', 'About Us and Contact Page updated successfully!');
    }
}
