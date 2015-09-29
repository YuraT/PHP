<?php
    include_once("function.php");
    $pdo = connect_pdo();
    
    
    if (is_null ($_COOKIE["user_id"])) {
        echo "ERROR: user id not found";
    }
    else {
        $query = "delete from users where ID = :user_id";
        $statment = $pdo->prepare($query);
        $statment->bindParam(":user_id", $_COOKIE["user_id"], PDO::PARAM_INT);
        
        if($statment->execute()) {
            echo "Your account has been deleted";
        }
        delete_user_info();
        header("Location: index.php");
    }
?>