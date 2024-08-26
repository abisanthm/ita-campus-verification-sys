<?php

namespace App\Http\Controllers;

use App\Models\Value;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateValueRequest;


class ValueController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create-value|edit-value|delete-value', ['only' => ['index','show']]);
        $this->middleware('permission:edit-value', ['only' => ['edit','update']]);
        $this->middleware('permission:delete-value', ['only' => ['destroy']]);
    }
     
    public function index()
    {
        $values = Value::all();
        return view('modules.values.index', compact('values'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Value $value)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $value = Value::find($id);
        $values = Value::all();
        return view('modules.values.index', compact('value','values'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateValueRequest $request, $id)
    {
        $validatedData = $request->validated();

        Value::where('id', $id)->update($validatedData);

        return redirect()->route('values.index')->withSuccess('Value is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Value $value)
    {
        //
    }
}
