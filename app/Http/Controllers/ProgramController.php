<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Programtype;
use App\Http\Requests\StoreProgramRequest;
use App\Http\Requests\UpdateProgramRequest;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create-program|edit-program|delete-program', ['only' => ['index','show']]);
        $this->middleware('permission:create-program', ['only' => ['create','store']]);
        $this->middleware('permission:edit-program', ['only' => ['edit','update']]);
        $this->middleware('permission:delete-program', ['only' => ['destroy']]);
    }

    public function index()
    {
        $programs = Program::all();
        return view('modules.programs.index', compact('programs'));
    }

    public function search(Request $request)
    {
        $term = $request->get('term');
        $courses = Program::where('program_full_name', 'LIKE', "%{$term}%")->pluck('program_full_name');
        return response()->json($courses);
    }

    public function create()
    {
        return view('modules.programs.create');
    }

    public function store(StoreProgramRequest $request)
    {
        Program::create($request->validated());
        return redirect()->route('programs.index')->with('success', 'Program created successfully.');
    }

    public function edit(Program $program)
    {
        $programs = Program::all();
        return view('modules.programs.index', compact('program','programs'));
    }

    public function update(UpdateProgramRequest $request, Program $program)
    {
        $program->update($request->validated());
        return redirect()->route('programs.index')->with('success', 'Program updated successfully.');
    }

    public function destroy(Program $program)
    {
        $program->delete();
        return redirect()->route('programs.index')->with('success', 'Program deleted successfully.');
    }

    public function fetchPrograms($programTypeId)
    {
        $programs = Program::join('program_programtype', 'programs.id', '=', 'program_programtype.program_id')
        ->join('program_types', 'program_programtype.program_type_id', '=', 'program_types.id')
        ->select('programs.*', 'program_types.name as program_type_name')
        ->where('program_types.id','=', $programTypeId)
        ->get();

        return response()->json(['programs' => $programs]);
    }
}
