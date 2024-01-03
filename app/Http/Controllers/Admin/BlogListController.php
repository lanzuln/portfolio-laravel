<?php

namespace App\Http\Controllers\Admin;

use App\Models\BlogList;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\BlogListDataTable;

class BlogListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(BlogListDataTable $dataTable)
    {
        return $dataTable->render('admin.blog.blog-item.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $blogCat=BlogCategory::all();
        return view('admin.blog.blog-item.create',compact('blogCat'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image'=>['required','image','max:5000'],
            'title'=>['required','max:200'],
            'description'=>['required'],
            'category_id'=>['required', 'numeric']

        ]);

        $image_path= handleUpload('image',);
        BlogList::create([
            'image'=> $image_path,
            'title'=>$request->input('title'),
            'description'=>$request->input('description'),
            'category_id'=>$request->input('category_id')
        ]);
        return redirect()->route('blog-item.index');
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
        $category =BlogCategory::get();
        $BlogList = BlogList::findOrFail($id);
        return view('admin.blog.blog-item.edit', compact('BlogList','category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'image'=>['image','max:5000'],
            'title'=>['required','max:200'],
            'description'=>['required'],
            'category_id'=>['required', 'numeric'],
            'client'=>['max:200'],
            'website'=>['url'],

        ]);
        $blogItem = BlogList::find($id);
        $image_path= handleUpload('image',$blogItem);
        BlogList::where('id', $id)->update([
            'image'=>  !empty($image_path)? $image_path:$blogItem->image,
            'title'=>$request->input('title'),
            'description'=>$request->input('description'),
            'category_id'=>$request->input('category_id'),
        ]);
        return redirect()->route('blog-item.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $BlogList=BlogList::find($id);
        deleteFileIfExist($BlogList->image);

        BlogList::where('id', $id)->delete();
    }
}
