<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class SlidersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::all();

        return view('admin.sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sliders.create');
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
            'url' => 'required|file|mimes:jpg,png,jpeg|max:5048',
            'route'=> 'nullable|string',
            'is_published' => 'nullable|boolean',
        ]);

      
         // Handle the photo upload
         if ($request->hasFile('url')) {
            $path = $request->file('url')->store('slider', 'public');
            if (!$path) {
                return redirect()->route('sliders.create')->with('error', 'Failed to store the file');
            }
            $validatedData['url'] = $path;
        }

        Slider::create($validatedData);

        return redirect()->route('sliders.index')->with('success','slider added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        return view('admin.sliders.show', compact('slider'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        return view('admin.sliders.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'url' => 'nullable|file|mimes:jpg,png,jpeg|max:5048',
            'route'=> 'nullable|string',
            'is_published' => 'nullable|boolean',
        ]);

      
         // Handle the photo upload
         if ($request->hasFile('url')) {
            $path = $request->file('url')->store('slider', 'public');
            if (!$path) {
                return redirect()->route('sliders.edit')->with('error', 'Failed to store the file');
            }
            $validatedData['url'] = $path;
        }

        $slider->update($validatedData);

        return redirect()->route('sliders.index')->with('success','slider edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        $slider->delete();

        return redirect()->route('sliders.index')->with('success','slider deleted');
    }
}
