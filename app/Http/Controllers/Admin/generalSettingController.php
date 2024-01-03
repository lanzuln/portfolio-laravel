<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\GeneralSetting;
use App\Http\Controllers\Controller;

class generalSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $genearlSetting =  GeneralSetting::first();
        return view('admin.setting.general-setting.index', compact('genearlSetting'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'site_logo' => ['required'],
            'footer_logo' => ['required'],
            'favicon' => ['required']
        ]);


        $generalSetting = GeneralSetting::find($id);

        $site_logo = handleUpload('site_logo', $generalSetting);
        $footer_logo = handleUpload('footer_logo', $generalSetting);
        $favicon = handleUpload('favicon', $generalSetting);

        GeneralSetting::updateOrCreate(
            ['id' => $id],
            [
                'site_logo' => (!empty($site_logo) ? $site_logo : $generalSetting->site_logo),
                'footer_logo' => (!empty($footer_logo) ? $footer_logo : $generalSetting->footer_logo),
                'favicon' => (!empty($favicon) ? $favicon : $generalSetting->favicon),
            ]
        );

        toastr()->success('update successfull');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
