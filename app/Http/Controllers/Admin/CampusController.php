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
    public function index()
    {
        $campus = Campus::all();
        return view("admin.campus.index",data: compact("campus"));
    }


    public function create()
    {
        return view("admin.campus.create");
    }

//save campus details
public function store(CampusRequest $request)
{
    $campusarray=$request->get("campus");

    if(empty($campusarray['id'])) {
        $campusarray['created_by']=Auth::id();
        Campus::query()->create($campusarray);
    }
    else{
        $campus=Campus::query()->find($campusarray['id']);
        if(!$campusarray) return redirect()->back()->with('error','Campus not found');
        $campusarray['updated_by']=Auth::id();
        $campus->update($campusarray);
    }
    return redirect()->route('campus.index')->with('success','Campus saved');
}

    public function edit($id)
    {
        $campus=Campus::find($id);
        return view("admin.campus.create",data: compact("campus"));
    }

        public function destroy($id)
    {
        $campus=Campus::find($id);
        $campus->delete();
        return redirect()->route("campus.index")->with("success","Campus successfully deleted");
    }
}
