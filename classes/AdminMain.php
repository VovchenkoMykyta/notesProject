<?php


class AdminMain
{
    static function init(){
        $storage = new AdminStorage('data.json');
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $note = $_POST['note'];
            $storage->addNote($note);
            header("Location: admin.php");
            exit();
        } elseif ($_SERVER['REQUEST_METHOD'] === 'GET'){
            $deleteId = filter_input(INPUT_GET, 'delete');
            if($deleteId !== null){
                $id = intval($deleteId);
                $storage->deleteNote($id);
            }
        }
    }
}