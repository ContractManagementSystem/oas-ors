<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\Academic_year;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\AcyRequest;

class AcademicYearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $academicYear = Academic_year::all();
        return view("admin.academicyears.index", compact("academicYear"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.academicyears.create");
    }

    public function store(AcyRequest $request)
    {
        $campusarray=$request->get("academic");

        if(empty($campusarray['id'])) {
            $campusarray['created_by']=Auth::id();
            Academic_year::query()->create($campusarray);
        }
        else{
            $year=Academic_year::query()->find($campusarray['id']);
            if(!$campusarray) return redirect()->back()->with('error','Academic not found');
            $campusarray['updated_by']=Auth::id();
            $year->update($campusarray);
        }
        return redirect()->route('academic.index')->with('success','Campus saved');
    }

        public function edit($id)
        {
            $year=Academic_year::find($id);
            return view("admin.academicyears.create",data: compact("year"));
        }

    public function show($id)
    {
        //
    }

    public function destroy($id)
    {
        $campus=Academic_year::find($id);
        $campus->delete();
        return redirect()->route("academic.index")->with("success","Academic Year successfully deleted");
    }
}
