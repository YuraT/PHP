<?php
    include_once("function.php");
    $pdo = connect_pdo();
    
    
    if (is_null ($_COOKIE["user_id"])) {
        echo "ERROR: user id not found";
    }
    else {
        $query = "delete from users where user_id = " . $_COOKIE["user_id"];
        $statment = $pdo->prepare($query);
        
        if($statment->execute()) {
            echo "Your account has been deleted";
        }
        header("Location: index.php");
    }
?>