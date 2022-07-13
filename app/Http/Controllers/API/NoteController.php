<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    // all notes
    public function index()
    {
        $notes = Note::where('user_id', Auth::id() )->get()->toArray();
        return array_reverse($notes);
    }

    // add note
    public function add(Request $request)
    {
        $note = new Note([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $request->user_id
        ]);
        $note->save();

        return response()->json('The note successfully added');
    }

    // edit note
    public function edit($id)
    {
        $note = Note::find($id);
        return response()->json($note);
    }

    // update note
    public function update($id, Request $request)
    {
        $note = Note::find($id);
        $note->update($request->all());

        return response()->json('The note successfully updated');
    }

    // delete note
    public function delete($id)
    {
        $note = Note::find($id);
        $note->delete();

        return response()->json('The note successfully deleted');
    }
}
