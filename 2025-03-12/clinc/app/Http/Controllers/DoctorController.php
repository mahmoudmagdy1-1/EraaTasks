<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        return view('pages.doctors.index');
    }
    public function show()
    {
        return view('pages.doctors.show');
    }
}
