<?php

namespace App\Services;

interface NoteService
{
    public function getAllNotes();
    
    public function getLatestNote();
    
    public function storeNote(array $data);

    public function getNoteById($noteId);

    public function updateNote(array $data, $noteId);

    public function deleteNote($noteId);
}