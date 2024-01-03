<?php

namespace App\Http\Controllers\Admin;

use App\Models\FeedBack;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\FeedBackDataTable;

class feedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(FeedBackDataTable $dataTable)
    {
        return $dataTable->render('admin.feedback.feedback.index');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.feedback.feedback.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>['required'],
            'designation'=>['required'],
            'comment'=>['required']
        ]);
        FeedBack::create([
            'name'=>$request->input('name'),
            'designation'=>$request->input('designation'),
            'comment'=>$request->input('comment')
        ]);
        return redirect()->route('feedback.index');


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
        $feedback=FeedBack::findOrFail($id);
        return view('admin.feedback.feedback.edit',compact('feedback'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'=>['required'],
            'designation'=>['required'],
            'comment'=>['required']
        ]);
        FeedBack::where('id', $id)->update([
            'name'=>$request->input('name'),
            'designation'=>$request->input('designation'),
            'comment'=>$request->input('comment')
        ]);

        return redirect()->route('feedback.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        FeedBack::where('id', $id)->delete();
    }
}
