<?php

setcookie('pseudo', $_POST['pseudo'], time() + 365*24*3600, null, null ,false, true);

try

{

    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '**********');

}

catch(Exception $e)

{

        die('Erreur : '.$e->getMessage());

}


$req = $bdd->prepare('INSERT INTO minichat (pseudo, message, gender) VALUES(?, ?, ?)');

$req->execute(array($_POST['pseudo'], $_POST['message'], $_POST['gender']));


header('Location: minichat.php');

?>
