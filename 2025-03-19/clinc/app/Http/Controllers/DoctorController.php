<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Major;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
{
    public function index()
    {
        $docs = Doctor::with('major')->get();
        return view('pages.doctors.index', compact('docs'));
    }
    public function show($id)
    {
        $doctor = Doctor::findOrFail($id);
        return view('pages.doctors.show', compact('doctor'));
    }

    public function create()
    {
        $majors = Major::all();
        return view('pages.doctors.create', compact('majors'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'phone' => 'required',
            'major_id' => 'required',
        ]);
        $doc = Doctor::create($validated);
        return redirect()->route('doctors')->with('success', 'Doctor created successfully');
    }
}
