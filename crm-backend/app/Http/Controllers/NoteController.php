<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\NoteService;

class NoteController extends Controller
{
    protected $noteService;

    public function __construct(NoteService $noteService)
    {
        $this->noteService = $noteService;
    }
    public function index()
    {
        $notes = $this->noteService->getAllNotes();
        return $notes;
    }

    public function getLatest()
    {
        $note = $this->noteService->getLatestNote();
        if ($note) {
            return $note;
        } else {
            // If no records are found, return a response indicating that the record is not found
            return response()->json(['message' => 'Note not found'], 404);
        }
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $note = $this->noteService->storeNote($data);
        return response()->json(['message' => 'Note stored successfully', 'note' => $note], 201);
    }

    public function show($noteId)
    {
        $note = $this->noteService->getNoteById($noteId);
        return $note;
    }

    public function update(Request $request, $noteId)
    {
        $data = $request->all();
        $note = $this->noteService->updateNote($data,$noteId);

        // Return the updated Notes record
        return response()->json(['message' => 'Note updated successfully', 'note' => $note], 201);
    }

    public function destroy($noteId)
    {
        $this->noteService->deleteNote($noteId);

        // Return a JSON response with a 204 status code
        return new JsonResponse(null, 204);
    }
}
