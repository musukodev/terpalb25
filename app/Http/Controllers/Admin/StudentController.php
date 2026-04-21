<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Traits\ImageProcessing;

class StudentController extends Controller
{
    use ImageProcessing;

    public function index()
    {
        $students = Student::orderBy('created_at', 'desc')->get();
        return view('admin.students.index', compact('students'));
    }

    public function create()
    {
        return view('admin.students.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:5120',
        ]);

        $imageUrl = $this->uploadAndProcessImage($request->file('image'), 'class-media/students');

        Student::create([
            'name' => $request->name,
            'description' => $request->description,
            'image_url' => $imageUrl,
        ]);

        return redirect()->route('admin.students.index')->with('success', 'Siswa berhasil ditambahkan!');
    }

    public function edit(Student $student)
    {
        return view('admin.students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
        ]);

        $data = [
            'name' => $request->name,
            'description' => $request->description,
        ];

        if ($request->hasFile('image')) {
            $data['image_url'] = $this->uploadAndProcessImage($request->file('image'), 'class-media/students');
        }

        $student->update($data);

        return redirect()->route('admin.students.index')->with('success', 'Data siswa berhasil diperbarui!');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('admin.students.index')->with('success', 'Siswa berhasil dihapus!');
    }
}
