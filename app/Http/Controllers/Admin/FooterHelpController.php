<?php

namespace App\Http\Controllers\Admin;

use App\Models\FooterHelp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\FooterHelpDataTable;

class FooterHelpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(FooterHelpDataTable $dataTable)
    {
        return $dataTable->render('admin.footer.help.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.footer.help.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required','max:50'],
            'url' => ['required','url']
        ]);

        FooterHelp::create([
            'name' => $request->name,
            'url' => $request->url,

        ]);
        return redirect()->route('help.index');
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
        $footerHelp = FooterHelp::findOrFail($id);
        return view('admin.footer.help.edit', compact('footerHelp'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        FooterHelp::where('id', $id)->update([
            'name' => $request->name,
            'url' => $request->url,
        ]);
        return redirect()->route('help.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        FooterHelp::where('id', $id)->delete();
    }
}
