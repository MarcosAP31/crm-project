<?php
namespace App\Repositories;

use App\Models\Note;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class NoteRepository
{
    public function getAll()
    {
        return Note::all();
    }

    public function getLatest()
    {
        // Find the last record and return it
        $lastNotes = Note::latest('NoteId')->first();

        // Notes if a record was found
        if ($lastNotes) {
            return $lastNotes;
        } else {
            // If no records are found, return a response indicating that the table is empty
            throw new ModelNotFoundException('No records found');
        }
    }

    public function store(array $data)
    {
        return Note::create($data);
    }

    public function getById($noteId)
    {
        $Note = Note::where('NoteId', $noteId)->firstOrFail();
        return $Note;
    }

    public function update(array $data, $noteId)
    {
        // Find the Notes record by NoteId
        $Note = Note::where('NoteId', $noteId)->firstOrFail();

        // Update the Notes record with the request data
        $Note->update($data);

        // Return the updated Notes record
        return $Note;
    }

    public function delete($noteId)
    {
        // Find the Notes record by NoteId
        $Note = Note::where('NoteId', $noteId)->firstOrFail();

        // Delete the Notes record
        $Note->delete();

    }
}
?>