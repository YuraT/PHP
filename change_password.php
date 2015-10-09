<?php
    $hash_password = "";
    $hash_password = hash("sha256", $_POST["old_password"]);
    $hash_new = "";
    $hash_new = hash("sha256", $_POST["new_password"]);

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
        echo "You already have the same password";
    }
    else {
        include_once("function.php");
        $pdo = connect_pdo();
        
        $user_id = (int)$_COOKIE["user_id"];
        
        echo $user_id;
        $query = "SELECT password FROM users WHERE ID = " . $user_id;
        $statment = $pdo->query($query);
        
        while ($row = $statment->fetch(PDO::FETCH_ASSOC)) {
            $hash_check = $row["password"];
        }
        
        if ($hash_password != $hash_check) {
            echo "old password does not match";
        }
        else {
            $query = "UPDATE users SET password = '" . $hash_new . "' WHERE ID = " . $user_id;
            $statment = $pdo->prepare($query);
            
            if($statment->execute()) {
                echo "Password successfully changed";
            }
        }
    }
?>

<br />
<br />

<button><a href="notes.php" style="color: blue;
text-decoration: none;">Go Back</a></button>