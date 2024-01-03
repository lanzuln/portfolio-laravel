<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\DataTables\SocialDataTable;
use App\Http\Controllers\Controller;
use App\Models\Social;

class socialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SocialDataTable $dataTable)
    {
        return $dataTable->render('admin.footer.social.index');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.footer.social.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'link' => ['required','url'],
            'icon' => ['required']
        ]);

        Social::create([
            'link' => $request->link,
            'icon' => $request->icon,

        ]);
        return redirect()->route('social.index');
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
        $social = Social::findOrFail($id);
        return view('admin.footer.social.edit', compact('social'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Social::where('id', $id)->update([
            'link' => $request->link,
            'icon' => $request->icon,
        ]);
        return redirect()->route('social.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Social::where('id', $id)->delete();
    }
}
