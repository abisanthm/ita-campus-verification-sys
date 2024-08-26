<?php

namespace App\Http\Controllers;
use App\Services\StudentService;


use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\ProgramType;
use App\Models\Program;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create-student|edit-student|delete-student', ['only' => ['index', 'show']]);
        $this->middleware('permission:create-student', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit-student', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-student', ['only' => ['destroy']]);
    }

    public function index()
    {
        $studentService = new StudentService();
        $students = $studentService->getStudentsData(10);
        return view('modules.students.index', ['students' => $students]);
    }

    public function show($id)
    {
        $studentService = new StudentService();
        $student = $studentService->getStudentByID($id);
        return view('modules.students.show', ['student' => $student]);
    }

    public function create()
    {
        $programTypes = ProgramType::all();
        return view('modules.students.create', compact('programTypes'));
    }

    public function store(StoreStudentRequest $request)
    {
        $validatedData = $request->validated();

        // Handle profile image upload
        if ($request->hasFile('profile_image')) {
            $profileImage = $request->file('profile_image');
            $profileImagePath = $profileImage->store('std_profile', 'public');
            $validatedData['profile_image_path'] = $profileImagePath;
        }

        // Handle certificate image upload
        if ($request->hasFile('certificate_image')) {
            $certificateImage = $request->file('certificate_image');
            $certificateImagePath = $certificateImage->store('certificate', 'public');
            $validatedData['certificate_image_path'] = $certificateImagePath;
        }

        // dd($validatedData);
        // Create a new student record
        Student::create($validatedData);

        return redirect()->route('students.index')->with('success', 'Student created successfully');
    }

    public function edit($id)
    {
        $programTypes = ProgramType::all();
        $programs = Program::all();
        $student = Student::findOrFail($id);

        return view('modules.students.edit', compact('student', 'programTypes', 'programs'));
    }

    public function update(UpdateStudentRequest $request, Student $student)
    {
        // Handle profile image upload
        if ($request->hasFile('profile_image')) {
            $profileImagePath = $request->file('profile_image')->store('std_profile', 'public');
            $student->profile_image_path = $profileImagePath;
        }

        // Handle certificate image upload
        if ($request->hasFile('certificate_image')) {
            $certificateImagePath = $request->file('certificate_image')->store('certificates', 'public');
            $student->certificate_image_path = $certificateImagePath;
        }

        // Retrieve the validated data from the request
        $validatedData = $request->validated();

        // Update the student record with the validated data
        $student->update($validatedData);

        return redirect()->route('students.index')->with('success', 'Student updated successfully');
    }

    public function destroy($id)
    {
        $student = Student::find($id);
        if (!$student) {
            abort(404, 'Student not found');
        }

        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted successfully');
    }
}
