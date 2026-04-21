<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\Album;

class PageController extends Controller
{
    public function index()
    {
        $teacher = Teacher::first();
        $students = Student::orderBy('created_at', 'desc')->get();
        $albums = Album::orderBy('created_at', 'desc')->get();

        return view('welcome', compact('teacher', 'students', 'albums'));
    }
}
