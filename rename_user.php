<?php
    include_once("function.php");
    $pdo = connect_pdo();
    setcookie(COOKIE_USERNAME, null, time() - 18000, "/");
    
    if (strlen(trim($_POST["new_name"]) === 0 || $_COOKIE["user_id"] === null)) {
        echo "You can't have null username";
        echo "<br /><br /><br />";
        echo '<button><a style="text-decoration: none; color: blue;" href="index.php">Go Back</a></button>';
    }
    else {
        $query = "Update users SET username='" . $_POST["new_name"] . "' Where ID = :user_id";
        $statment = $pdo->prepare($query);
        $statment->bindParam(":user_id", $_COOKIE["user_id"], PDO::PARAM_INT);
        
        if($statment->execute()) {
            echo "Your account has been renamed to " . $_POST["new_name"];
            setcookie(COOKIE_USERNAME, $_POST["new_name"], time() + 18000, "/");
        }
    }
?>

<br />
<br />

<button><a style="text-decoration: none; color: blue;" href="notes.php">Go Back</a></button>