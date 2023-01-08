<?php

namespace App\Http\Controllers\User\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting = Setting::first();
        return view('user.admin.setting.index')->with([
            'title' => 'Data Setting',
            'setting' => $setting
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $setting = Setting::first();

        if ($setting) {
            $request->validate([
                'name_web' => 'required',
                'url_web' => 'required',
                'phone_web' => 'required',
                'email_web' => 'required',
                'yt_web' => 'required',
                'tw_web' => 'required',
                'logo_web' => 'image|mimes:jpg,png|max:3000',
                'bg_web' => 'image|mimes:jpg,png|max:5000',
                'wa_web' => 'required',
                'ig_web' => 'required',
                'fb_web' => 'required',
                'alamat' => 'required'

            ]);
            if ($request->hasFile('logo_web')) {
                File::delete('image/logo/' . $setting->logo);
                $logo = $request->file('logo_web');
                $logoName = time() . $logo->hashName();
                $logo->move('image/logo', $logoName);
                if ($request->hasFile('bg_web')) {
                    File::delete('image/background/' . $setting->background);
                    $bg = $request->file('bg_web');
                    $bgName = time() . $bg->hashName();
                    $bg->move('image/background', $bgName);

                    $setting->update([
                        'name_website' => $request->name_web,
                        'url_website' => $request->url_web,
                        'phone_website' => $request->phone_web,
                        'email_website' => $request->email_web,
                        'wa_website' => $request->wa_web,
                        'address_website' => $request->alamat,
                        'fb_website' => $request->fb_web,
                        'ig_website' => $request->ig_web,
                        'youtube_website' => $request->yt_web,
                        'twitter_website' => $request->tw_web,
                        'logo' => $logoName,
                        'background' => $bgName
                    ]);
                } else {
                    $setting->update([
                        'name_website' => $request->name_web,
                        'url_website' => $request->url_web,
                        'phone_website' => $request->phone_web,
                        'email_website' => $request->email_web,
                        'wa_website' => $request->wa_web,
                        'address_website' => $request->alamat,
                        'fb_website' => $request->fb_web,
                        'ig_website' => $request->ig_web,
                        'youtube_website' => $request->yt_web,
                        'twitter_website' => $request->tw_web,
                        'logo' => $logoName,
                    ]);
                }
            } else {
                if ($request->hasFile('bg_web')) {
                    File::delete('image/background/' . $setting->background);
                    $bg = $request->file('bg_web');
                    $bgName = time() . $bg->hashName();
                    $bg->move('image/background', $bgName);

                    $setting->update([
                        'name_website' => $request->name_web,
                        'url_website' => $request->url_web,
                        'phone_website' => $request->phone_web,
                        'email_website' => $request->email_web,
                        'wa_website' => $request->wa_web,
                        'address_website' => $request->alamat,
                        'fb_website' => $request->fb_web,
                        'ig_website' => $request->ig_web,
                        'youtube_website' => $request->yt_web,
                        'twitter_website' => $request->tw_web,
                        'background' => $bgName
                    ]);
                } else {
                    $setting->update([
                        'name_website' => $request->name_web,
                        'url_website' => $request->url_web,
                        'phone_website' => $request->phone_web,
                        'email_website' => $request->email_web,
                        'wa_website' => $request->wa_web,
                        'address_website' => $request->alamat,
                        'fb_website' => $request->fb_web,
                        'ig_website' => $request->ig_web,
                        'youtube_website' => $request->yt_web,
                        'twitter_website' => $request->tw_web,
                    ]);
                }
            }
            return redirect()->back()->with('message', 'Data Setting Updated');
        } else {
            $request->validate([
                'name_web' => 'required',
                'url_web' => 'required',
                'phone_web' => 'required',
                'email_web' => 'required',
                'yt_web' => 'required',
                'tw_web' => 'required',
                'logo_web' => 'required|image|mimes:jpg,png|max:3000',
                'bg_web' => 'required|image|mimes:jpg,png|max:5000',
                'wa_web' => 'required',
                'ig_web' => 'required',
                'fb_web' => 'required',
                'alamat' => 'required'

            ]);
            $logo = $request->file('logo_web');
            $logoName = time() . $logo->hashName();
            $logo->move('image/logo', $logoName);

            $bg = $request->file('bg_web');
            $bgName = time() . $bg->hashName();
            $bg->move('image/background', $bgName);
            Setting::create([
                'name_website' => $request->name_web,
                'url_website' => $request->url_web,
                'phone_website' => $request->phone_web,
                'email_website' => $request->email_web,
                'wa_website' => $request->wa_web,
                'address_website' => $request->alamat,
                'fb_website' => $request->fb_web,
                'ig_website' => $request->ig_web,
                'youtube_website' => $request->yt_web,
                'twitter_website' => $request->tw_web,
                'logo' => $logoName,
                'background' => $bgName
            ]);

            return redirect()->back()->with('message', 'Data Setting Created');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}