<?php

namespace App\Http\Controllers;

use App\Models\Major;
use Illuminate\Http\Request;

class MajorController extends Controller
{
    public function index()
    {
        $majors = Major::with('doctors')->get();
        return view('pages.major.index', compact('majors'));
    }
    public function doctors($id)
    {
        $major = Major::with('doctors')->findOrFail($id);
        $doctors = $major->doctors;
        return view('pages.major.doctors', compact('major', 'doctors'));
    }

    public function create()
    {
        return view('pages.major.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        $major = Major::create($validated);
        return redirect()->route('majors.index')->with('success', 'Major created successfully');
    }
}
