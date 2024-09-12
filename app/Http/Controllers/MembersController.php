<?php

namespace App\Http\Controllers;

use App\Models\Conference;
use App\Models\Member;
use App\Models\Speaker;
use Illuminate\Http\Request;

class MembersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = Member::all();

        return view('admin.members.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $conferences = Conference::all();
        $speakers = Speaker::all();


        return view('admin.members.create', compact('conferences','speakers'));
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
            'title' => 'required|string',
            'organization' => 'required|string',
            'speaker_id' => 'required',
            'conference_id' => 'required',
            'photo' => 'required|file|mimes:jpg,png,jpeg|max:5048',
            'is_published' => 'nullable|boolean',
        ]);

      
         // Handle the photo upload
         if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('members', 'public');
            if (!$path) {
                return redirect()->route('members.create')->with('error', 'Failed to store the file');
            }
            $validatedData['photo'] = $path;
        }

        Member::create($validatedData);

        return redirect()->route('members.index')->with('success','member added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        return view('admin.members.show', compact('member'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        $conferences = Conference::all();
        $speakers = Speaker::all();

        return view('admin.members.edit', compact('member','conferences','speakers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'title' => 'required|string',
            'organization' => 'required|string',
            'speaker_id' => 'required',
            'conference_id' => 'required',
            'photo' => 'required|file|mimes:jpg,png,jpeg|max:5048',
            'is_published' => 'nullable|boolean',
        ]);

      
         // Handle the photo upload
         if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('members', 'public');
            if (!$path) {
                return redirect()->route('members.edit')->with('error', 'Failed to store the file');
            }
            $validatedData['photo'] = $path;
        }

        $member->update($validatedData);

        return redirect()->route('members.index')->with('success','member edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        $member->delete();

        return redirect()->route('members.index')->with('success','member deleted');
    }
}
