<?php

namespace App\Http\Controllers\Admin;

use App\Models\SkillItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\SkillItemDataTable;

class SkillItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SkillItemDataTable $dataTable)
    {
        return $dataTable->render('admin.skill.skill-item.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.skill.skill-item.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:100'],
            'parcent' => ['required', 'numeric', 'max:100']
        ]);

        SkillItem::create([
            'name' => $request->name,
            'parcent' => $request->parcent,

        ]);
        return redirect()->route('skill-item.index');
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
        $skill = SkillItem::findOrFail($id);
        return view('admin.skill.skill-item.edit', compact('skill'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        SkillItem::where('id', $id)->update([
            'name' => $request->input('name'),
            'parcent' => $request->input('parcent')
        ]);
        return redirect()->route('skill-item.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        SkillItem::where('id', $id)->delete();
    }
}
