<?php

namespace App\Http\Controllers;

use App\Models\Primary_menu;
use App\Models\Submenu;
use Illuminate\Http\Request;

class SubmenusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $submenus = Submenu::all();

        return view('admin.submenus.index', compact('submenus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $primary_menus = primary_menu::all();

        return view('admin.submenus.create', compact('primary_menus'));
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
            'route' => 'nullable|string',
            'external_url' => 'nullable|string',
            'primary_menu_id'=> 'required',
            'is_published' => 'nullable|boolean',
        ]);

        Submenu::create($validatedData);

        return redirect()->route('submenus.index')->with('success','sub menu added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Submenu  $submenu
     * @return \Illuminate\Http\Response
     */
    public function show(Submenu $submenu)
    {
        return view('admin.submenus.show', compact('submenu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Submenu  $submenu
     * @return \Illuminate\Http\Response
     */
    public function edit(Submenu $submenu)
    {
        $primary_menus = primary_menu::all();

        return view('admin.submenus.edit', compact('submenu', 'primary_menus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Submenu  $submenu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Submenu $submenu)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'route' => 'nullable|string',
            'external_url' => 'nullable|string',
            'primary_menu_id'=> 'required',
            'is_published' => 'nullable|boolean',
        ]);

        $submenu->update($validatedData);

        return redirect()->route('submenus.index')->with('success','sub menu edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Submenu  $submenu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Submenu $submenu)
    {
        $submenu->delete();

        return redirect()->route('submenus.index')->with('success','sub menu deleted');
    }
}
