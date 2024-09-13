<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Campus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\CampusRequest;
use App\Http\Requests\Admin\CampusUpdateRequest;

class CampusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $campus = Campus::all();
        return view("admin.campus.index",data: compact("campus"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.campus.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CampusRequest $request)

{
 $c=new Campus();
 $c->created_by = Auth::id();
 $c->name= $request->name;
 $c->save();
  return redirect()->route("campus.index")->with("success","Campus succesfully Created");
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $campus=Campus::find($id);
        return view("admin.campus.edit",data: compact("campus"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CampusUpdateRequest $request, $id)
    {
        $campus=Campus::find($id);
        $campus->name=$request->name;
        $campus->updated_by=Auth::id();
        $campus->update();
        return redirect()->route("campus.index")->with("success","Campus Successfully updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $campus=Campus::find($id);
        $campus->delete();
        return redirect()->route("campus.index")->with("success","Campus successfully deleted");
    }
}