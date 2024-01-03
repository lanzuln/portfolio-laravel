<?php

namespace App\Http\Controllers\Admin;

use App\Models\FooterInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FooterInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $footerInfo = FooterInfo::first();
        return view('admin.footer.info.index', compact('footerInfo'));
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
            'subtitle' => ['required', 'max:500'],
            'copyright' => ['required', 'max:500'],
            'powerde' => ['max:200'],
        ]);

        FooterInfo::updateOrCreate(
            ['id' => $id],
            [
                'subtitle' => $request->input('subtitle'),
                'copyright' => $request->input('copyright'),
                'powerde' => $request->input('powerde'),
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
