<?php
    include_once("function.php");
    $pdo = connect_pdo();
    
    if ($_POST["password"] != $_POST["password_repeat"]) {
        echo "passwords don't match";
    }
    else if (strlen(trim($_POST["name"])) === 0 || strlen(trim($_POST["password"])) === 0) {
        echo "you can not choose null value";
    }
    else {
        $hash_password = "";
        $hash_password = hash("sha256", $_POST["password"]);
        $query = "INSERT INTO users (username, password) VALUES(:username, :password)";
        $statment = $pdo->prepare($query);
        $statment->bindParam(":username", $_POST["name"], PDO::PARAM_STR, 20);
        $statment->bindParam(":password", $hash_password, PDO::PARAM_STR, 64);
        
        if($statment->execute()) {
            echo "registred account: " . $_POST['name'];
        }
    }
?>

<br />
<br />

<button><a style="text-decoration: none; color: blue;" href="index.php">Go Back</a></button>