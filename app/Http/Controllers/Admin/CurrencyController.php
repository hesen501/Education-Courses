<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;
use App\Models\Currency;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Currency\Request;

class CurrencyController extends Controller
{
    public function index()
    {
        $currencies = Currency::query()
            ->select('id', 'name', 'symbol', 'code')
            ->get();
            
        return view('admin.pages.currencies.index', compact('currencies'));
    }

    public function create()
    {
        return view('admin.pages.currencies.create');
    }

    public function store(Request $request)
    {
        Currency::create([
            'name'   => $request->name,
            'symbol' => $request->symbol,
            'code'   => $request->code,
        ]);
        
        return back()->with('success', 'Currency created successfully');
    }

    public function show($id)
    {
        $currency = Currency::query()->findOrFail($id);
        
        return view('admin.pages.currencies.show', compact('currency'));
    }

    public function edit($id)
    {
        $currency = Currency::query()->findOrFail($id);
        
        return view('admin.pages.currencies.edit', compact('currency'));
    }

    public function update(Request $request, $id)
    {
        $currency = Currency::query()->findOrFail($id);
        
        $currency->update([
            'name'   => $request->name,
            'symbol' => $request->symbol,
            'code'   => $request->code,
        ]);

        return back()->with('success', 'Currency updated successfully');
    }

    public function destroy($id)
    {
        Currency::destroy($id);
        
        Course::query()->where('currency_id', $id)->update(['currency_id' => 0]);
        
        return back()->with('success', 'Currency deleted successfully');
    }
}
