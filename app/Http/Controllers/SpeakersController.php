<?php

namespace App\Http\Controllers;

use App\Models\Speaker;
use Illuminate\Http\Request;

class SpeakersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $speakers = Speaker::all();

        return view('admin.speakers.index', compact('speakers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.speakers.create');
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
            'type' => 'required|string|max:255',
            'no' => 'required|integer',
        ]);

        Speaker::create($validatedData);

        return redirect()->route('speakers.index')->with('success','type added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Speaker  $speaker
     * @return \Illuminate\Http\Response
     */
    public function show(Speaker $speaker)
    {
        return view('admin.speakers.show', compact('speaker'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Speaker  $speaker
     * @return \Illuminate\Http\Response
     */
    public function edit(Speaker $speaker)
    {
        $speakers = Speaker::all();

        return view('admin.speakers.edit', compact('speaker'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Speaker  $speaker
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Speaker $speaker)
    {
        $validatedData = $request->validate([
            'type' => 'required|string|max:255',
            'no' => 'required|integer',
        ]);

        $speaker->update($validatedData);

        return redirect()->route('speakers.index')->with('success','type edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Speaker  $speaker
     * @return \Illuminate\Http\Response
     */
    public function destroy(Speaker $speaker)
    {
        $speaker->delete();

        return redirect()->route('speakers.index')->with('success','deleted');
    }
}
