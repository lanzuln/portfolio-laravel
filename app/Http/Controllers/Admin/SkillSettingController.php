<?php

namespace App\Http\Controllers\Admin;

use App\Models\Skill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SkillSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skill = Skill::first();
        return view('admin.skill.skill-setting.index', compact('skill'));
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
            'title' => ['required', 'max:200'],
            'subtitle' => ['required', 'max:500']
        ]);
        $skill = Skill::find($id);
        $imagePath = handleUpload('image', $skill);

        Skill::updateOrCreate(
            ['id' => $id],
            [
                'title' => $request->input('title'),
                'subtitle' => $request->input('subtitle'),
                'image' => (!empty($imagePath) ? $imagePath : $skill->image)
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
