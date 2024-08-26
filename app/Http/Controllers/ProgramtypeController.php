<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\ProgramType;
use Illuminate\Http\Request;

class ProgramTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create-program-type|edit-program-type|delete-program-type', ['only' => ['index','show']]);
        $this->middleware('permission:create-program-type', ['only' => ['create','store']]);
        $this->middleware('permission:edit-program-type', ['only' => ['edit','update']]);
        $this->middleware('permission:delete-program-type', ['only' => ['destroy']]);
    }

    public function index()
    {
        $programTypes = ProgramType::with('programs')->get();
        $programs = Program::all();
        return view('modules.program_types.index', compact('programTypes','programs'));
    }

    public function store(Request $request)
    {

        $programType = ProgramType::create($request->all());
        $programType->programs()->sync($request->input('programs', []));

        return redirect()->route('program-types.index')->with('success', 'Program type created successfully.');
    }

    public function edit($id)
    {
        $programs = Program::all();
        $programType = ProgramType::findOrFail($id);
        $programTypes = ProgramType::all();
        return view('modules.program_types.index', compact('programType', 'programTypes','programs'));
    }

    public function update(Request $request, ProgramType $programType)
    {
        // Validation rules if needed

        $programType->update($request->all());
        $programType->programs()->sync($request->input('programs', []));

        return redirect()->route('program-types.index')->with('success', 'Program type updated successfully.');
    }

    public function destroy(ProgramType $programType)
    {
        $programType->programs()->detach();
        $programType->delete();

        return redirect()->route('program-types.index')->with('success', 'Program type deleted successfully.');
    }
}
