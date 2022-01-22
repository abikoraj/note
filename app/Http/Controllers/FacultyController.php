<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use Illuminate\Http\Request;

class FacultyController extends Controller
{
    public function submit(Request $request)
    {
        $faculty = new Faculty();
        $faculty->university_id = $request->university_id;
        $faculty->name = $request->name;
        // dd($faculty);
        $faculty->save();
        return back()->with('message', 'Faculty Added Successfully!');
    }

    public function update(Faculty $faculty, Request $request)
    {
        // $faculty->university_id = $request->university_id;
        $faculty->name = $request->name;
        // dd($faculty);
        $faculty->save();
        return back()->with('message', 'Faculty Added Successfully!');
    }

    public function delete(Faculty $faculty)
    {
        $faculty->delete();
        return back()->with('message', 'Faculty Deleted Successfully!');
    }

    public function view(Faculty $faculty)
    {
        return view('Program.index', ['faculty' => $faculty]);
    }
}
