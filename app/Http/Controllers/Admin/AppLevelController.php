<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\Applevel;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AppLevelRequest;
use Illuminate\Support\Facades\Auth;

class AppLevelController extends Controller
{
    public function index(){
        $level=Applevel::all();
        return view("admin.applicationlevels.index",compact("level"));
    }
    public function create(){
        return view("admin.applicationlevels.create");

    }
    public function store(AppLevelRequest $request)
    {
        $intakearray=$request->get("level");

        if(empty($intakearray['id'])) {
            $intakearray['created_by']=Auth::id();
            Applevel::query()->create($intakearray);
        }
        else{
            $intake=Applevel::query()->find($intakearray['id']);
            if(!$intake) return redirect()->back()->with('error','Intake not found');
            $intakearray['updated_by']=Auth::id();
            $intake->update($intakearray);
        }
        return redirect()->route('level.index')->with('success','Application Level saved');
    }
    public function edit($id)
    {
        $level=Applevel::find($id);
        return view("admin.applicationlevels.create",data: compact("level"));
    }

        public function destroy($id)
    {
        $level=Applevel::find($id);
        $level->delete();
        return redirect()->route("level.index")->with("success","Application Level successfully deleted");
    }
}
