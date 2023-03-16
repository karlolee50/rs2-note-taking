<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNoteRequest;
use App\Http\Resources\V1\NoteResource;
use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
  public function index () {
    return NoteResource::collection(Note::all());
  }

  public function store (StoreNoteRequest $request) {
    Note::create($request->validated());
    return response()->json('Note Created');
  }

  public function update (StoreNoteRequest $request, Note $note) {
    $note->update($request->validated());
    return response()->json('Note Updated');
  }

  public function show(Note $note) {
    return new NoteResource($note);
  }

  public function destroy(Note $note) {
    $note->delete();
    return response()->json('Note deleted');
  }
}
