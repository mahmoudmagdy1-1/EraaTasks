<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Major;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $doctors = Doctor::take(4)->with('major')->get();
        $majors = Major::take(4)->get();
        return view('pages.home', compact('doctors', 'majors'));
    }

    public function contact()
    {
        return view('pages.contact');
    }
}
