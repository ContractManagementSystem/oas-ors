<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Campus;
use App\Models\Admin\Intake;
use Illuminate\Http\Request;
use App\Models\Admin\Applevel;
use App\Models\Admin\Programme;
use App\Models\Admin\Academic_year;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProgrammeRequest;
use Illuminate\Support\Facades\Auth;

class ProgrammeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programs = Programme::list()->get();

        return view('admin.programs.index', compact('programs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $campus=Campus::all();
        $intake=Intake::all();
        $aca=Academic_year::all();
        $level=Applevel::all();
        return view('admin.programs.create', compact('campus','aca','intake','level'));
    }
    //edit programme
    public function edit($id)
    {
        $program=Programme::list()->where('p.id',$id)->first();
        if(!$program) return back()->error('error','programme not found');
        $campus=Campus::all();
        $intake=Intake::all();
        $aca=Academic_year::all();
        $level=Applevel::all();
        return view('admin.programs.create', compact('program','campus','aca','intake','level'));
    }
 //save and update programme
 public function store(ProgrammeRequest $request)
{
    $intakearray=$request->get("program");

    if(empty($intakearray['id'])) {
        $intakearray['created_by']=Auth::id();
        Programme::query()->create($intakearray);
    }
    else{
        $intake=Programme::query()->find($intakearray['id']);
        if(!$intake) return redirect()->back()->with('error','Intake not found');
        $intakearray['updated_by']=Auth::id();
        $intake->update($intakearray);
    }
    return redirect()->route('programme.index')->with('success','Intake saved');
}
}