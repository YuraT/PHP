<?php
    
    if ($_COOKIE["user_id"] === null) {
        echo "Please login again";
    }
    else if($_POST["new_password"] != $_POST["new_password_repeat"]) {
        echo "passwords don't match";
    }
    else if (strlen(trim($_POST["new_password"])) === 0) {
        echo "You can't have null password";
    }
    else if ($_POST["old_password"] == $_POST["new_password"]) {
        header("Location: notes.php");
    }
    else {
        include_once("function.php");
        $pdo = connect_pdo();
        // $statment = $pdo->query($query);
    
        echo "hi";
        $query = "SELECT * FROM users WHERE ID = :id";
        $statment = $pdo->prepare($query);
        $statment->bindParam(":id", $_COOKIE["user_id"], PDO::PARAM_INT);
        
        while ($row = $statment->fetch(PDO::FETCH_ASSOC)) {
            echo $row["username"];
        }
        echo "hiiii";
    }
?>