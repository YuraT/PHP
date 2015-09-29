<?php
    include_once("function.php");
    $pdo = connect_pdo();
    echo $_POST["id"];

    $query = "DELETE from notes Where ID = :ID";
    $statment = $pdo->prepare($query);
    $statment->bindParam(":ID", $_POST['id'], PDO::PARAM_INT);
    
    if($statment->execute()) {
        echo "Note has been deleted: ";
    }
    
    header("Location: notes.php");
?>