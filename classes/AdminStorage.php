<?php


class AdminStorage extends Storage
{
    public function deleteNote($id){
        $notes = $this->getAllNotes();
        unset($notes[$id]);
        $newNotes = $this->addNotesAdmin($notes);
        return $newNotes;
    }
    public function addNotesAdmin(array $notes){
        $adminNotes = json_encode($notes);
        file_put_contents($this->storageFile,$adminNotes);
    }

}