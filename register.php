<?php
    include_once("function.php");
    $pdo = connect_pdo();
    echo $_POST["password"] . "  " . $_POST["password_repeat"];
    
    if ($_POST["password"] != $_POST["password_repeat"]) {
        header("Location: index.php");
    }
    else {
        $query = "INSERT INTO users (username, password) VALUES(:username, :password)";
        $statment = $pdo->prepare($query);
        $statment->bindParam(":username", $_POST["name"], PDO::PARAM_STR, 20);
        $statment->bindParam(":password", $_POST['password'], PDO::PARAM_STR, 99);
    }

    
    if($statment->execute()) {
        echo "registred account: " . $_POST['name'];
    }
    echo "<button>Go Back" . header("Location: index.php") . "</button>";
?>