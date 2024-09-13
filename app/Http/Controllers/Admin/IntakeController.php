<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Campus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\CampusRequest;
use App\Http\Requests\Admin\CampusUpdateRequest;
use App\Models\Admin\Academic_year;
use App\Models\Admin\Intake;

class IntakeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $intakes =Intake::list()->get();
        return view("admin.intakes.index",data: compact("intakes"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
        $academic=Academic_year::all();
        return view("admin.intakes.create",compact("academic"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CampusRequest $request)

{
 $c=new Intake();
 $c->created_by = Auth::id();
 $c->name= $request->name;
 $c->acy= $request->acy;
 $c->save();
  return redirect()->route("intake.index")->with("success","Intake succesfully Created");
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
        $intake=Intake::find($id);
        if(!$intake) return back()->error('error','Intanke not found');
        $academic=Academic_year::all();
        return view("admin.intakes.edit",data: compact("intake", "academic"));
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