<?php
namespace App\Http\Controllers\Admin;
use App\Models\Admin\Campus;
use App\Models\Admin\Intake;
use App\Models\Admin\Academic_year;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\IntakeRequest;
class IntakeController extends Controller
{
    public function index()
    {
        $intakes =Intake::list()->get();
        return view("admin.intakes.index",data: compact("intakes"));
    }
    public function create()
    {
        $academic=Academic_year::all();
        return view("admin.intakes.create",compact("academic"));
    }
    public function store(IntakeRequest $request)
{
    $intakearray=$request->get("intake");

    if(empty($intakearray['id'])) {
        $intakearray['created_by']=Auth::id();
        Intake::query()->create($intakearray);
    }
    else{
        $intake=Intake::query()->find($intakearray['id']);
        if(!$intake) return redirect()->back()->with('error','Intake not found');
        $intakearray['updated_by']=Auth::id();
        $intake->update($intakearray);
    }
    return redirect()->route('intake.index')->with('success','Intake saved');
}

    public function edit($id)
    {
        $intake=Intake::list()->where('int.id',$id)->first();
        if(!$intake) return back()->error('error','Intanke not found');
        $academic=Academic_year::all();
        return view("admin.intakes.create",data: compact("intake", "academic"));
    }
    //delete intake
    public function destroy($id)
    {
        $campus=Campus::find($id);
        $campus->delete();
        return redirect()->route("campus.index")->with("success","Campus successfully deleted");
    }
}