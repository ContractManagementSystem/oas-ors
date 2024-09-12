<?php

namespace App\Http\Controllers;

use App\Models\Conference;
use Illuminate\Http\Request;

class ConferencesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $conferences = Conference::all();

        return view('admin.conferences.index', compact('conferences'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $regions = [
            'Arusha', 'Dar es Salaam', 'Dodoma', 'Geita', 'Iringa',
            'Kagera', 'Katavi', 'Kigoma', 'Kilimanjaro', 'Lindi',
            'Manyara', 'Mara', 'Mbeya', 'Morogoro', 'Mtwara',
            'Mwanza', 'Njombe', 'Pemba North', 'Pemba South',
            'Pwani', 'Rukwa', 'Ruvuma', 'Shinyanga', 'Simiyu',
            'Singida', 'Tabora', 'Tanga', 'Zanzibar North',
            'Zanzibar South & Central', 'Zanzibar West'
        ];
        return view('admin.conferences.create', compact('regions'));
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
            'title' => 'required|string|max:255',
            'theme'=> 'required|string',
            'date'=> 'required|date',
            'venue'=> 'required|string',
            'region'=> 'required|string',
            'is_published' => 'nullable|boolean',
        ]);

        Conference::create($validatedData);

        return redirect()->route('conferences.index')->with('success','conference added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Conference  $conference
     * @return \Illuminate\Http\Response
     */
    public function show(Conference $conference)
    {
        return view('admin.conferences.show', compact('conference'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Conference  $conference
     * @return \Illuminate\Http\Response
     */
    public function edit(Conference $conference)
    {
        $regions = [
            'Arusha', 'Dar es Salaam', 'Dodoma', 'Geita', 'Iringa',
            'Kagera', 'Katavi', 'Kigoma', 'Kilimanjaro', 'Lindi',
            'Manyara', 'Mara', 'Mbeya', 'Morogoro', 'Mtwara',
            'Mwanza', 'Njombe', 'Pemba North', 'Pemba South',
            'Pwani', 'Rukwa', 'Ruvuma', 'Shinyanga', 'Simiyu',
            'Singida', 'Tabora', 'Tanga', 'Zanzibar North',
            'Zanzibar South & Central', 'Zanzibar West'
        ];
        return view('admin.conferences.edit', compact('conference','regions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Conference  $conference
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Conference $conference)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'theme'=> 'required|string',
            'date'=> 'required|date',
            'venue'=> 'required|string',
            'region'=> 'required|string',
            'is_published' => 'nullable|boolean',
        ]);

        $conference->update($validatedData);

        return redirect()->route('conferences.index')->with('success','conference updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Conference  $conference
     * @return \Illuminate\Http\Response
     */
    public function destroy(Conference $conference)
    {
        $conference->delete();

        return redirect()->route('conferences.index')->with('success','conference deleted');
    }
}
