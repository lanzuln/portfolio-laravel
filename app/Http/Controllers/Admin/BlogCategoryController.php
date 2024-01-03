<?php

namespace App\Http\Controllers\Admin;

use App\Models\BlogList;
use Illuminate\Support\Str;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Models\BlogBlogCategory;
use App\Http\Controllers\Controller;
use App\DataTables\BlogCategoryDataTable;

class BlogCategoryController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index(BlogCategoryDataTable $dataTable)
    {
        return $dataTable->render('admin.blog.category.index');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blog.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:200']
        ]);
        BlogCategory::create([
            'name' => $request->input('name'),
            'slug' => Str::slug($request->input('name'))
        ]);
        return redirect()->route('blog-category.index');
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
        $BlogCategory = BlogCategory::find($id);
        return view('admin.blog.category.edit', compact('BlogCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        BlogCategory::where('id', $id)->update([
            'name' => $request->input('name'),
            'slug' => Str::slug($request->input('name'))
        ]);
        return redirect()->route('blog-category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $BlogCategory=BlogCategory::find($id);
        $hasItem=BlogList::where('category_id',$BlogCategory->id)->count();
        if ($hasItem==0) {
            BlogCategory::where('id', $id)->delete();
            return true;
        }
        return response(['status'=>'error']);
    }
}
