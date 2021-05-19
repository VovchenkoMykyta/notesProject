<?php


class Storage
{
    public $storageFile = 'data.json';

    public function __construct($storageFile)
    {
        $this->storageFile = $storageFile;
    }

    /**
     * @return mixed
     */
    public function getAllNotes(){
        return json_decode(file_get_contents($this->storageFile), true);
    }

    public function AddNote($note){
        $notes = $this->getAllNotes();
        $notes[] = $note;
        file_put_contents($this->storageFile, json_encode($notes));
    }

    public function getOneNote($id){
        if(!is_int($id)){
            echo "ID is not int";
        } else {
            $notes = $this->getAllNotes();
            return $notes[$id];
        }
        return false;
    }
}