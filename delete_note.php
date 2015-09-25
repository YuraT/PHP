<?php
    include_once("function.php");
    $pdo = connect_pdo();
    echo $_POST["id"];
    
    /*if($_COOKIE[COOKIE_USER_ID] === null) {
        echo "ERROR: user id not found" . "<br />" . "Try again";
    }*/
    //else {
        // try {
            $query = "DELETE from notes Where ID = :ID";
            $statment = $pdo->prepare($query);
            $statment->bindParam(":ID", $_POST['id'], PDO::PARAM_INT);
            
            if($statment->execute()) {
                echo "Note has been deleted: ";
            }
            
            
            
        /*    echo $_POST["new_note"];
            
            echo "<br />";
            
            echo "user id is: " . $_COOKIE[COOKIE_USER_ID];
        }
        catch (PDOException $e) {
            trigger_error("Error occured while trying to add the note: " . $e->getMessage(), E_USER_ERROR);
        }*/
        
       header("Location: notes.php");
    //}
?>