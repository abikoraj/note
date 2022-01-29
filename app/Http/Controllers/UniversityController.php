<?php

namespace App\Http\Controllers;

use App\Models\University;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UniversityController extends Controller
{
    public function index()
    {
        $university = DB::table('universities')->get();
        return view('university.index', ['uni' => $university]);
    }

    public function submit(Request $request)
    {
        $university = new University();
        if ($request->hasFile('logo')) {
            $university->logo = $request->logo->store('data/uni-logo');
        }
        $university->name = $request->name;
        // dd($university);
        $university->save();
        return redirect()->back()->with('message', 'University Added Successfully!');
    }

    public function update(University $university, Request $request)
    {
        if ($request->hasFile('logo')) {
            $university->logo = $request->logo->store('data/uni-logo');
        }
        $university->name = $request->name;
        $university->save();
        return redirect()->back()->with('message', 'University Edited Successfully!');
    }

    public function delete(University $university)
    {
        $university->delete();
        return back()->with('message', 'University Deleted Successfully');
    }

    public function view(University $university)
    {
        return view('faculty.index', ['uni' => $university]);
    }

    public function list()
    {
        $uni = DB::table('universities')->get();
        return view('university.app', ['univ' => $uni]);
    }

    public function front(University $university)
    {
        return view('faculty.front', ['uni' => $university]);
    }
}
