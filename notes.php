<html>
    <head>
        <title>PHP Notes</title>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    </head>
    
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
                    echo "<li>" . $row["notes_text"] . '<form action="delete_note.php" method="post"><input type="submit" value="delete" /><input type="hidden" name="id" value="' . $row["ID"] . '"></form>' .     "</li>";
                }
                echo "</ol>";
            }
            echo "<br />" . "<br />" . "<br />" . "<br />" . '<form action=delete_user.php method="post"><input type="submit" value="DELETE USER" /></form>';
        ?>
        
        <br />
        <br />
        <br />
        <br />
        
        <form action="Out.php" method="post">
            <input type="submit" value="Sign Out" />
        </form>
        
        <form action="delete_all.php" method="post">
            <input id="delete_all" type="submit" value="Delete all notes"/>
        </form>
        
        <!--<div id="dialog-confirm" title="Empty the recycle bin?">-->
        <!--    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>These items will be permanently deleted and cannot be recovered. Are you sure?</p>-->
        <!--</div>-->
        
        <form action="rename_user.php" method="post">
            <input type="text" name="new_name" placeholder="rename_user" />
            <input type="submit" value="rename" />
        </form>
        
        <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>-->
        <!--<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>-->
        <!--<script src="app.js"></script>-->
    </body>
</html>