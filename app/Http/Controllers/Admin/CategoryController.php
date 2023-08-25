<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Http\Requests\Admin\Category\UpdateRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::query()
            ->select('id','name','category_id')
            ->with('children')
            ->get();
            
        return view('admin.pages.categories.index',compact('categories'));
    }

    public function create()
    {
        $categories = Category::query()
            ->select('id','name','category_id')
            ->get();
        
        return view('admin.pages.categories.create',compact('categories'));
    }

    public function store(StoreRequest $request)
    {
        Category::create([
            'name'=>$request->name,
            'category_id'=>$request->category_id,
        ]);
        
        return back()->with('success','Category created successfully');
    }

    public function show($id)
    {
        $category = Category::query()
            ->with('children')
            ->findOrFail($id);

        return view('admin.pages.categories.show',compact('category'));
    }

    public function edit($id)
    {
        $category = Category::query()->findOrFail($id);
        $categories = Category::query()
            ->where('id','!=',$category->id)
            
            ->get();
        return view('admin.pages.categories.edit',compact('category','categories'));
    }

    public function update(UpdateRequest $request, $id)
    {
        $category = Category::query()->findOrFail($id);
        $category_id = ($request->category_id) ? $request->category_id : 0;
        $category->update([
            'name'=>$request->name,
            'category_id'=>$category_id,
        ]);

        return back()->with('success', 'Category updated successfully');
    }

    public function destroy($id)
    {
        Category::destroy($id);
        Category::query()->where('category_id', $id)->delete();
        return back()->with('success', 'Category deleted successfully');
    }
}

