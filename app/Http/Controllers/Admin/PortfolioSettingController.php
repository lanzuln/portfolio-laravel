<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\PortfolioSetting;
use App\Http\Controllers\Controller;

class PortfolioSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $PortfolioSetting=PortfolioSetting::first();
        return view('admin.portfolio.setting.index',compact('PortfolioSetting'));
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

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => ['required', 'max:200'],
            'subtitle' => ['required', 'max:500'],
        ]);
        PortfolioSetting::updateOrCreate(
            ['id' => $id],
            [
                'title' => $request->input('title'),
                'subtitle' => $request->input('subtitle'),
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
