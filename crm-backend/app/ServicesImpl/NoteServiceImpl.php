<?php

namespace App\ServicesImpl;

use App\Services\NoteService;
use App\Repositories\NoteRepository;

class NoteServiceImpl implements NoteService
{
    protected $noteRepository;

    public function __construct(NoteRepository $noteRepository)
    {
        $this->noteRepository = $noteRepository;
    }

    public function getAllNotes()
    {
        return $this->noteRepository->getAll();
    }

    public function getLatestNote()
    {
        return $this->noteRepository->getLatest();
    }

    public function storeNote(array $data)
    {
        return $this->noteRepository->store($data);
    }

    public function getNoteById($noteId)
    {
        return $this->noteRepository->getById($noteId);
    }

    public function updateNote(array $data, $noteId)
    {
        return $this->noteRepository->update($data, $noteId);
    }

    public function deleteNote($noteId)
    {
        $this->noteRepository->delete($noteId);
    }
}