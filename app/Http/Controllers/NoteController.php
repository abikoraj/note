<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    public function add(Request $request, $type)
    {
        if ($request->getMethod() == "POST") {
            $note = new Note();
            if ($type == 1) {
                $note->subject_id = $request->subject_id;
                $note->chapter = $request->chapter;
            }
            $note->title = $request->title;
            $note->content = $request->content;
            $note->desc = $request->desc;
            $note->tags = $request->tags;
            $note->type = $type;
            // dd($note);
            $note->save();
            // $note->user_id = Auth::user()->id;
            return back();
        } else {
            return view('Note.add', ['type' => $type]);
        }
    }

    public function fileAdd(Request $request)
    {
        $file = new File();
        $file->note_id = $request->note_id;
        $file->name = $request->name;
        $file->file = $request->file->store('data/files');
        // dd($file);
        $file->save();
        return back();
    }
}
