<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        $docs = Doctor::with('major')->get();
        return view('pages.doctors.index', compact('docs'));
    }
    public function show()
    {
        return view('pages.doctors.show');
    }
}
