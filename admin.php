<?php
spl_autoload_register(function ($className) {
    $classFilePath = 'classes/' . $className . '.php';
    if (file_exists($classFilePath)) {
        include_once $classFilePath;
        return true;
    }
    return false;
});
$adminPage = new AdminPage('admin.php','admin.php');
$adminPage->render();
$adminStorage = new AdminStorage('data.json');
AdminMain::init();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="styles/admin.css"/>
    <title>Admin</title>
</head>
<body>
    <header>
        <h1>
            Admin panel
        </h1>
    </header>
    <div>
        <form method="post">
            <textarea name="note" placeholder="Add note"></textarea>
            <input type="submit" value="Add note">
        </form>
        <?php
        $notes = $adminStorage->getAllNotes();
        if(!is_null($notes)){
            echo "<table><tr><td>№</td><td>Note</td><td>Options</td></tr>";
            foreach ($notes as $i=> $note){
                echo "<tr><td>$i</td><td>".$note."</td><td><a href='?delete=$i'>delete</a></td></tr>";
            }
            echo "</table>";
        }
        ?>
    </div>
</body>
</html>