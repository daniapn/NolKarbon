<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmissionTemplate;


class EmissionTemplateController extends Controller
{
    public function index()
    {
        $templates = EmissionTemplate::all();
        return view('admin.emission_card.index', compact('templates'));
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|max:100']);
        EmissionTemplate::create(['name' => $request->name]);
        return redirect()->back()->with('success', 'Template created successfully.');
    }

    public function edit($id)
{
    // ambil data berdasarkan ID
    $template = EmissionTemplate::findOrFail($id);

    // kirim ke view edit.blade.php
    return view('admin.emission_card.edit', compact('template'));
}


    public function update(Request $request, $id)
    {
        $request->validate(['name' => 'required|string|max:100']);
        $template = EmissionTemplate::findOrFail($id);
        $template->update(['name' => $request->name]);
        return redirect()->route('admin.admin.emission-card')->with('success', 'Template updated successfully.');
    }

    public function destroy($id)
    {
        EmissionTemplate::destroy($id);
        return redirect()->route('admin.admin.emission-card.deleted')
                         ->with('success', 'Template deleted successfully.');
    }

    public function create() {
        return view('Admin.emission_card.create');
    }


    public function deleted()
    {
        return view('admin.emission_card.deleted');
    }
    
}
