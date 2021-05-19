<div>
    <?php
    $storage = new Storage('data.json');
    $notes = $storage->getAllNotes();
    if(!is_null($notes)){
        foreach ($notes as $i=> $note){
            echo "<p><a href='?id=$i'>".$note."</p>";
        }
    }
    ?>
</div>