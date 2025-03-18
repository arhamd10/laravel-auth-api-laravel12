<?php
namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request)
{
    $query = Student::query();

    if ($request->has('search')) {
        $search = $request->search;
        $query->where('first_name', 'LIKE', "%$search%")
              ->orWhere('last_name', 'LIKE', "%$search%")
              ->orWhere('email_id', 'LIKE', "%$search%")
              ->orWhere('username', 'LIKE', "%$search%");
    }

    $students = $query->paginate(3); // 5 students per page

    return view('students.index', compact('students'));
}
    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'email_id' => 'required|email|unique:students,email_id',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'username' => 'required|string|unique:students,username',
            'date_of_birth' => 'required|date',
            'standard' => 'required|string',
            'gender' => 'required|in:Male,Female,Other',
            'entry_year' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('students', 'public');
            $validated['image'] = $imagePath;
        }

        Student::create($validated);

        return redirect()->route('students.index')->with('success', 'Student added successfully.');
    }

    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'email_id' => 'required|email|unique:students,email_id,' . $student->student_id . ',student_id',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'username' => 'required|string|unique:students,username,' . $student->student_id . ',student_id',
            'date_of_birth' => 'required|date',
            'standard' => 'required|string',
            'gender' => 'required|in:Male,Female,Other',
            'entry_year' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
    
        if ($request->has('remove_image')) {
            $student->image = null;
        }
    
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('students', 'public');
            $validated['image'] = $imagePath;
        }
    
        $student->update($validated);
    
        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
}