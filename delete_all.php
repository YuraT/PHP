<?php
    include_once("function.php");
    $pdo = connect_pdo();
    echo $_POST["id"];
    
    $query = "DELETE from notes Where user_ID = " . $_COOKIE["user_id"];
    $statment = $pdo->prepare($query);
    
    if($statment->execute()) {
        echo "All notes have been deleted from your account";
    }
    header("Location: notes.php");
?>