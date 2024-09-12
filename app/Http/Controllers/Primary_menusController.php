<?php

namespace App\Http\Controllers;

use App\Models\Primary_menu;
use App\Models\menu;
use Illuminate\Http\Request;

class Primary_menusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $primary_menus = Primary_menu::all();

        return view('admin.primary_menus.index', compact('primary_menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = menu::all();

        return view('admin.primary_menus.create', compact('menus')); 
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
            'no' => 'required|integer',
            'is_published' => 'nullable|boolean',
            'menu_id'=> 'required',
        ]);

           // Conditionally add validation for the additional input
        if ($request->has('content')) {
           $content = $request->input('content');
            $validatedData['content'] = $content;
        }


        Primary_menu::create($validatedData);

        return redirect()->route('primary_menus.index')->with('success','primary menu added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Primary_menu  $primary_menu
     * @return \Illuminate\Http\Response
     */
    public function show(Primary_menu $primary_menu)
    {
        return view('admin.primary_menus.show', compact('primary_menu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Primary_menu  $primary_menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Primary_menu $primary_menu)
    {
        $menus = menu::all();

        return view('admin.primary_menus.edit', compact('primary_menu', 'menus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Primary_menu  $primary_menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Primary_menu $primary_menu)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'route'=> 'nullable',
            'external_url'=> 'nullable',
            'no' => 'required|integer',
            'is_published' => 'required|boolean', 
            'menu_id'=> 'nullable',
        ]);

        // Conditionally add validation for the additional input
        if ($request->has('content')) {
            $content = $request->input('content');
             $validatedData['content'] = $content;
         }

        $primary_menu->update($validatedData);

        return redirect()->route('primary_menus.index')->with('success','primary menu edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Primary_menu  $primary_menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Primary_menu $primary_menu)
    {
        $primary_menu->delete();

        return redirect()->route('primary_menus.index')->with('success','primary menu deleted');
    }
}
