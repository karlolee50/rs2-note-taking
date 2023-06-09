<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNoteRequest;
use App\Http\Resources\V1\NoteResource;
use App\Models\Label;
use App\Models\Note;

class NoteController extends Controller
{
  public function index () {
    return NoteResource::collection(Note::with('labels')->get());
  }

  public function store (StoreNoteRequest $request) {
    $labelIds = array();
    foreach($request->noteLabels as $label) {
      $existingLabel = Label::where('id', $label['id'])->first();
      if ($existingLabel) {
        array_push($labelIds, $existingLabel->id);
      } else {
        $label = Label::create([
          'name' => $label['name']
        ]);
        array_push($labelIds, $label->id);
      }
    }
    Note::create($request->validated())->labels()->attach($labelIds);

    return response()->json('Note created');
  }

  public function update (StoreNoteRequest $request, Note $note) {
    $note->update($request->validated());
    return response()->json('Note Updated');
  }

  public function show(Note $note) {
    return new NoteResource($note->load(('labels')));
  }

  public function destroy(Note $note) {
    $note->delete();
    return response()->json('Note deleted');
  }
}
