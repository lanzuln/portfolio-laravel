<?php

namespace App\Http\Controllers\Admin;

use App\Models\FooterUseful;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\FooterUsefulDataTable;

class FooterUsefullController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(FooterUsefulDataTable $dataTable)
    {
        return $dataTable->render('admin.footer.usefull-links.index');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.footer.usefull-links.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required','max:50'],
            'url' => ['required']
        ]);

        FooterUseful::create([
            'name' => $request->name,
            'url' => $request->url,

        ]);
        return redirect()->route('usefull-link.index');
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
        $FooterUseful = FooterUseful::findOrFail($id);
        return view('admin.footer.usefull-links.edit', compact('FooterUseful'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        FooterUseful::where('id', $id)->update([
            'name' => $request->name,
            'url' => $request->url,
        ]);
        return redirect()->route('usefull-link.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        FooterUseful::where('id', $id)->delete();
    }
}
