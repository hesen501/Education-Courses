<?php

namespace App\Http\Controllers\Admin;

use App\Models\Language;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Language\Request;

class LanguageController extends Controller
{
    public function index()
    {
        $languages = Language::query()
            ->select('id', 'name')
            ->get();
        
        return view('admin.pages.languages.index', compact('languages'));
    }

    public function create()
    {
        return view('admin.pages.languages.create');
    }

    public function store(Request $request)
    {
        Language::create([
            'name' => $request->name,
            'slug' => $request->slug
        ]);
        
        return back()->with('success', 'Language created successfully');
    }

    public function show($id)
    {
        $language = Language::query()->findOrFail($id);
        return view('admin.pages.languages.show', compact('language'));
    }

    public function edit($id)
    {
        $language = Language::query()->findOrFail($id);
        return view('admin.pages.languages.edit', compact('language'));
    }

    public function update(Request $request, $id)
    {
        $language = Language::query()->findOrFail($id);
        $language->update([
            'name' => $request->name,
            'slug' => $request->slug,
        ]);

        return back()->with('success', 'Language updated successfully');
    }

    public function destroy($id)
    {
        Language::destroy($id);
        return back()->with('success', 'Language deleted successfully');
    }
}

