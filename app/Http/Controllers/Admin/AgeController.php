<?php

namespace App\Http\Controllers\Admin;

use App\Models\Age;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Age\Request;

class AgeController extends Controller
{
    public function index()
    {
        $ages = Age::query()->select('id','name')->get();
        return view('admin.pages.ages.index',compact('ages'));
    }

    public function create()
    {
        return view('admin.pages.ages.create');
    }

    public function store(Request $request)
    {
        Age::create([
            'name'=>$request->name,
        ]);
        return back()->with('success','Age created successfully');
    }

    public function show($id)
    {
        $age = Age::query()->findOrFail($id);
        return view('admin.pages.ages.show',compact('age'));
    }

    public function edit($id)
    {
        $age = Age::query()->findOrFail($id);

        return view('admin.pages.ages.edit',compact('age'));
    }

    public function update(Request $request, $id)
    {
        $age = Age::query()->findOrFail($id);
        $age->update([
            'name'=>$request->name,
        ]);

        return back()->with('success','Age updated successfully');
    }

    public function destroy($id)
    {
        Age::destroy($id);
        return back()->with('success','Age deleted successfully');
    }
}
