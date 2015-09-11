<html>
    <body>
        <?php
            $servername = getenv("IP");
            $username = getenv("C9_USER");
            $password = "";
            $database = "c9";
            $dbport = 3306;
            
            $query = null;
            
            $pdo = new PDO("mysql:host=" . $servername . ";dbname=" . $database, $username, $password);
            $statment = $pdo->query($query);
            /*$row = $statment->fetch(PDO::FETCH_ASSOC);*/
            $cookie_user_id = "user_id";
            $user_id = $_COOKIE[$cookie_user_id];
            
            if ($user_id === null) {
                header("Location: index.php");
            }
            else {
                
                echo "<br />";
                
                echo "Welcome" . " " . $_COOKIE["username"]; 
                
                echo "Your id is : " . $user_id . "<br /><br /><br />";
                
                $query = "SELECT * FROM notes WHERE user_ID ='" . $user_id . "'";
                $statment = $pdo->query($query);
                
                echo "<h2>Add New Note</h2>";
                echo '<form action="add_note.php" method="post" border="1">
                        <input type="text" name="new_note" placeholder="note" />
                        <input type="submit" value="Add Note" />
                    </form>';
                
                echo "<ol>";
                while ($row = $statment->fetch(PDO::FETCH_ASSOC)) {
                    echo "<li>" . $row["notes_text"] . "</li>";
                }
                echo "</ol>";
            }
        ?>
    </body>
</html>