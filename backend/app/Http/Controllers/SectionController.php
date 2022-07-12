<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Section;

class SectionController extends Controller
{
    private $section;

    public function __construct(Section $section)
    {
        $this->section = $section;
    }

    public function index()
    {
        $all_sections = $this->section->all();
        return view('sections.index')->with('all_sections', $all_sections);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|max:50|unique:sections,name'
        ]);

        $this->section->name = ucwords(strtolower($request->name));
        $this->section->save();

        return redirect()->back();
    }

    public function destroy($id)
    {
        $this->section->destroy($id);
        return redirect()->back();
    }
}

