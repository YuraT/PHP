<html>
    <body>
        <?php
            include_once("function.php");
            $pdo = connect_pdo();
    
            if($_COOKIE[COOKIE_USER_ID] === null) {
                echo "ERROR: user id not found" . "<br />" . "Try again";
             }
            else {
                try {
                    $user_id = $_COOKIE[COOKIE_USER_ID];
                    $query = "INSERT INTO notes (user_id, notes_text) VALUES(:user_id, :notes_text)";
                    $statment = $pdo->prepare($query);
                    $statment->bindParam(":user_id", $user_id, PDO::PARAM_INT);
                    $statment->bindParam(":notes_text", $_POST['new_note'], PDO::PARAM_STR, 250);
        
                    
                    if($statment->execute()) {
                        echo "Note has been added: ";
                    }
                    
                    
                    
                    echo $_POST["new_note"];
                    
                    echo "<br />";
                    
                    echo "user id is: " . $_COOKIE[COOKIE_USER_ID];
                    }
                    catch (PDOException $e) {
                        trigger_error("Error occured while trying to add the note: " . $e->getMessage(), E_USER_ERROR);
                    }
                
                    header("Location: notes.php");
            }
        ?>
    </body>
</html>