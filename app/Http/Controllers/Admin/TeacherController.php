<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Traits\ImageProcessing;
use Illuminate\Support\Facades\Storage;

class TeacherController extends Controller
{
    use ImageProcessing;

    public function index()
    {
        $teacher = Teacher::first();
        if (!$teacher) {
            // Auto create default if not exists
            $teacher = Teacher::create([
                'name' => 'Dr. Budi Santoso, M.Kom',
                'quotes' => 'Kode yang baik adalah kode yang bisa dibaca esok hari.',
                'image_url' => 'https://images.unsplash.com/photo-1568602471122-7832951cc4c5?auto=format&fit=crop&q=80&w=800'
            ]);
        }
        return view('admin.teacher.index', compact('teacher'));
    }

    public function update(Request $request, Teacher $teacher)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'quotes' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
        ]);

        $data = [
            'name' => $request->name,
            'quotes' => $request->quotes,
        ];

        if ($request->hasFile('image')) {
            $data['image_url'] = $this->uploadAndProcessImage($request->file('image'), 'class-media/teacher');
        }

        $teacher->update($data);

        return redirect()->route('admin.teacher.index')->with('success', 'Data wali kelas berhasil diperbarui!');
    }
}
