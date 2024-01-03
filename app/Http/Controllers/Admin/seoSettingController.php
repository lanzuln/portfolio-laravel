<?php

namespace App\Http\Controllers\Admin;

use App\Models\SeoSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class seoSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $SeoSetting=SeoSetting::first();
        return view('admin.setting.seo-setting.index', compact('SeoSetting'));
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
            'title' => ['required'],
            'description' => ['required'],
            'keywords' => ['required']
        ]);

        SeoSetting::updateOrCreate(
            ['id' => $id],
            [
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'keywords' => $request->input('keywords')
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
