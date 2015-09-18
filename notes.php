<html>
    <body>
        <?php
            include_once("function.php");
            $pdo = connect_pdo();
            $statment = $pdo->query($query);
            $user_id = $_COOKIE[COOKIE_USER_ID];
            
            if (is_null ($user_id) || $user_id === "") {
                header("Location: index.php");
            }
            else {
                
                echo "<br />";
                
                echo "Welcome" . " " . $_COOKIE["username"];
                
                echo "<br />";
                
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
        
        <form action="Out.php" method="post">
            <input type="submit" value="Sign Out">
        </form>
    </body>
</html>