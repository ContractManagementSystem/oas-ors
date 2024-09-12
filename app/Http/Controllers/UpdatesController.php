<?php

namespace App\Http\Controllers;

use App\Models\Update;
use Illuminate\Http\Request;

class UpdatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $updates = Update::all();

        return view('admin.updates.index', compact('updates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.updates.create');
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
            $path = $request->file('photo')->store('update', 'public');
            if (!$path) {
                return redirect()->route('updates.create')->with('error', 'Failed to store the file');
            }
            $validatedData['photo'] = $path;
        }

        Update::create($validatedData);

        return redirect()->route('updates.index')->with('success','update added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Update  $update
     * @return \Illuminate\Http\Response
     */
    public function show(Update $update)
    {
        return view('admin.updates.show', compact('update'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Update  $update
     * @return \Illuminate\Http\Response
     */
    public function edit(Update $update)
    {
        return view('admin.updates.edit', compact('update'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Update  $update
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Update $update)
    {
        $validatedData = $request->validate([
            'title' => 'required|string',
            'photo' => 'nullable|file|mimes:jpg,png,jpeg|max:5048',
            'description'=> 'nullable|string',
            'is_published' => 'nullable|boolean',
        ]);

      
         // Handle the photo upload
         if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('update', 'public');
            if (!$path) {
                return redirect()->route('updates.edit')->with('error', 'Failed to store the file');
            }
            $validatedData['photo'] = $path;
        }

        $update->update($validatedData);

        return redirect()->route('updates.index')->with('success','update edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Update  $update
     * @return \Illuminate\Http\Response
     */
    public function destroy(Update $update)
    {
        $update->delete();

        return redirect()->route('updates.index')->with('success','update deleted');
    }
}
