<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\FooterContact;
use App\Http\Controllers\Controller;

class FooterContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contact= FooterContact::first();
        return view('admin.footer.contact.index', compact('contact'));
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
            'phone' => ['required', 'max:50'],
            'email' => ['required', 'max:100','email'],
            'address' => ['required', 'max:500']
        ]);
        FooterContact::updateOrCreate(
            ['id' => $id],
            [
                'phone' => $request->input('phone'),
                'email' => $request->input('email'),
                'address' => $request->input('address'),
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
