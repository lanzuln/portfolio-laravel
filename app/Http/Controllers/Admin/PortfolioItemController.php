<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\PortfolioItem;
use App\Http\Controllers\Controller;
use App\DataTables\PortfolioItemDataTable;
use App\Models\Category;

class PortfolioItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PortfolioItemDataTable $dataTable)
    {
        return $dataTable->render('admin.portfolio.portfolio-item.index');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category =Category::get();
        return view('admin.portfolio.portfolio-item.create',compact('category'));
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
            'category_id'=>['required', 'numeric'],
            'client'=>['max:200'],
            'website'=>['url'],

        ]);

        $image_path= handleUpload('image',);
        PortfolioItem::create([
            'image'=> $image_path,
            'title'=>$request->input('title'),
            'description'=>$request->input('description'),
            'category_id'=>$request->input('category_id'),
            'client'=>$request->input('client'),
            'website'=>$request->input('website'),
        ]);
        return redirect()->route('portfolio-item.index');

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
        $category =Category::get();
        $portfolioItem = PortfolioItem::findOrFail($id);
        return view('admin.portfolio.portfolio-item.edit', compact('portfolioItem','category'));
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
        $portfolioItem = PortfolioItem::find($id);
        $image_path= handleUpload('image',$portfolioItem);
        PortfolioItem::where('id', $id)->update([
            'image'=>  !empty($image_path)? $image_path:$portfolioItem->image,
            'title'=>$request->input('title'),
            'description'=>$request->input('description'),
            'category_id'=>$request->input('category_id'),
            'client'=>$request->input('client'),
            'website'=>$request->input('website'),
        ]);
        return redirect()->route('portfolio-item.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $portfolioItem=PortfolioItem::find($id);
        deleteFileIfExist($portfolioItem->image);

        PortfolioItem::where('id', $id)->delete();
    }
}
