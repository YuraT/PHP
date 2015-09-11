<html>
    <body>
        <?php
            $servername = getenv("IP");
            $username = getenv ("C9_USER");
            $password = "";
            $database = "c9";
            $dbport = 3306;
            
            $cookie_user_id = "user_id";
            
            if($_COOKIE[$cookie_user_id] === null) {
                echo "ERROR: user id not found" . "<br />" . "Try again";
            }
            else {
                try {
                    $user_id = $_COOKIE[$cookie_user_id];
                    $query = "INSERT INTO notes (user_id, notes_text) VALUES(:user_id, :notes_text)";
                    $pdo = new PDO("mysql:host=" . $servername . ";dbname=" . $database, $username, $password);
                    $statment = $pdo->prepare($query);
                    $statment->bindParam(":user_id", $user_id, PDO::PARAM_INT);
                    $statment->bindParam(":notes_text", $_POST['new_note'], PDO::PARAM_STR, 250);
                    
                    
                    if($statment->execute()) {
                        echo "Note has been added: ";
                    }
                    
                    
                    
                    echo $_POST["new_note"];
                    
                    echo "<br />";
                    
                    echo "user id is: " . $_COOKIE[$cookie_user_id];
                }
                catch (PDOException $e) {
                    trigger_error("Error occured while trying to add the note: " . $e->getMessage(), E_USER_ERROR);
                }
                
                header("Location: notes.php");
            }
        ?>
    </body>
</html>