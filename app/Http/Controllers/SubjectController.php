<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function submit(Request $request)
    {
        $subject = new Subject();
        $subject->name = $request->name;
        $subject->class = $request->class;
        $subject->code = $request->code;
        $subject->tag = $request->tag;
        $subject->program_id = $request->program_id;
        $subject->save();
        // dd($subject);
        return back()->with('message', 'Subject Added Successfully!');
    }

    public function update(Subject $subject, Request $request)
    {
        $subject->name = $request->name;
        $subject->class = $request->class;
        $subject->code = $request->code;
        $subject->tag = $request->tag;
        // $subject->program_id = $request->program_id;
        $subject->save();
        // dd($subject);
        return back()->with('message', 'Subject Updated Successfully!');
    }

    public function delete(Subject $subject)
    {
        $subject->delete();
        return back()->with('message', 'Subject Deleted Successfully!');
    }
}
