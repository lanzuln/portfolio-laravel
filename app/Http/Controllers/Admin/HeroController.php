<?php

namespace App\Http\Controllers\Admin;

use App\Models\Hero;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class HeroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $hero = Hero::first();
        return view('admin.hero.index', compact('hero'));
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
            'description' => ['required', 'max:500']
        ]);


        $hero = Hero::first();
        if ($request->hasFile("background")) {
            if ($hero && File::exists(public_path($hero->background))) {
                File::delete(public_path($hero->background));
            }
            $image = $request->file("background");
            $imageName = rand() . $image->getClientOriginalName();
            $image->move(public_path('/uploads'), $imageName);
            $image_url = "uploads/{$imageName}";
        }

        Hero::updateOrCreate(
            ['id' => $id],
            [
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'btn_text' => $request->input('btn_text'),
                'btn_link' => $request->input('btn_link'),
                'background' => isset($image_url) ? $image_url : $hero->background
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
