<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function submit(Request $request)
    {
        $program = new Program();
        $program->faculty_id = $request->faculty_id;
        $program->name = $request->name;
        $program->type = $request->type;
        $program->save();
        // dd($program);
        return back()->with('message', 'Program Added Successfully!');
    }

    public function update(Program $program, Request $request)
    {
        $program->name = $request->name;
        $program->type = $request->type;
        $program->save();
        return back()->with('message', 'Program Updated Successfully!');
    }

    public function delete(Program $program)
    {
        $program->delete();
        return back()->with('message', 'Program Deleted Successfully!');
    }

    public function view(Program $program)
    {
        return view('subject.index', ['program' => $program]);
    }
}
