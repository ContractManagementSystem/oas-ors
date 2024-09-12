<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class ProgramsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programs = Program::all();

        return view('admin.programs.index', compact('programs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.programs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string',
            'photo' => 'required|file|mimes:jpg,png,jpeg|max:5048',
            'description'=> 'nullable|string',
            'is_published' => 'nullable|boolean',
        ]);

      
         // Handle the photo upload
         if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('program', 'public');
            if (!$path) {
                return redirect()->route('programs.create')->with('error', 'Failed to store the file');
            }
            $validatedData['photo'] = $path;
        }

        Program::create($validatedData);

        return redirect()->route('programs.index')->with('success','program added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function show(Program $program)
    {
        return view('admin.programs.show', compact('program'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function edit(Program $program)
    {
        return view('admin.programs.edit', compact('program'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Program $program)
    {
        $validatedData = $request->validate([
            'title' => 'required|string',
            'photo' => 'nullable|file|mimes:jpg,png,jpeg|max:5048',
            'description'=> 'nullable|string',
            'is_published' => 'nullable|boolean',
        ]);

      
         // Handle the photo upload
         if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('program', 'public');
            if (!$path) {
                return redirect()->route('programs.edit')->with('error', 'Failed to store the file');
            }
            $validatedData['photo'] = $path;
        }

        $program->update($validatedData);

        return redirect()->route('programs.index')->with('success','program edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function destroy(Program $program)
    {
        $program->delete();

        return redirect()->route('programs.index')->with('success','program deleted');
    }
}
