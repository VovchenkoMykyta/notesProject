<?php


class Main
{
    static function init(){
        $storage = new Storage('data.json');
        if($_SERVER['REQUEST_METHOD'] === 'GET'){
            $id = filter_input(INPUT_GET, 'id');
            if($id===null){
                $notes = $storage->getAllNotes();
                $page = new Page('html/all_notes_page.php', 'html/main_template.php');
                $page->render(['notes' => $notes]);
            }elseif($id!==null){
                $intId = intval($id);
                $note = $storage->getOneNote($intId);
                $page = new Page('html/one_note_page.php');
                $page->render(['note' => $note]);
            }
        } else if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $note = $_POST['note'];
            $storage->AddNote($note);
            self::redirect();
        }
    }

    static function error404(){
        echo "No such file 404";
        exit();
    }

    static function redirect(){
        header("Location: admin.php");
        exit();
    }
}