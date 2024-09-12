<?php

namespace App\Http\Controllers;

use App\Models\Logo;
use Illuminate\Http\Request;

class LogosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logos = Logo::all();

        return view('admin.logos.index', compact('logos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.logos.create');
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
            'name' => 'required|string',
            'photo' => 'required|file|mimes:jpg,png,jpeg|max:5048',
            'route'=> 'nullable|string',
            'is_published' => 'nullable|boolean',
        ]);

      
         // Handle the photo upload
         if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('logo', 'public');
            if (!$path) {
                return redirect()->route('logos.create')->with('error', 'Failed to store the file');
            }
            $validatedData['photo'] = $path;
        }

        Logo::create($validatedData);

        return redirect()->route('logos.index')->with('success','logo added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Logo  $logo
     * @return \Illuminate\Http\Response
     */
    public function show(Logo $logo)
    {
        return view('admin.logos.show', compact('logo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Logo  $logo
     * @return \Illuminate\Http\Response
     */
    public function edit(Logo $logo)
    {
        return view('admin.logos.edit', compact('logo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Logo  $logo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Logo $logo)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'photo' => 'nullable|file|mimes:jpg,png,jpeg|max:5048',
            'route'=> 'nullable|string',
            'is_published' => 'nullable|boolean',
        ]);

      
         // Handle the photo upload
         if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('logo', 'public');
            if (!$path) {
                return redirect()->route('logos.edit')->with('error', 'Failed to store the file');
            }
            $validatedData['photo'] = $path;
        }

        $logo->update($validatedData);

        return redirect()->route('logos.index')->with('success','logo edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Logo  $logo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Logo $logo)
    {
        $logo->delete();

        return redirect()->route('logos.index')->with('success','logo deleted');
    }
}
