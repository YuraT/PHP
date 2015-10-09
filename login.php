<html>
    <body>
        <?php
            include_once("function.php");
            $pdo = connect_pdo();
            $hash_password = "";
            $hash_password = hash("sha256", $_POST["password"]);
            
            $query = "SELECT * FROM users WHERE username = '" . $_POST["username"] . "' and password='" . $hash_password . "'";
            
            $statment = $pdo->query($query);
            $row = $statment->fetch(PDO::FETCH_ASSOC);
            $user_id = $row["ID"];
            
             if ($user_id === null) {
                header("Location: index.php");
            }
            else {
                
                //user_id cookie
                setcookie(COOKIE_USER_ID, $user_id, time() + 18000);
                
                //username cookie
                $username = strtolower($_POST["username"]);
                setcookie(COOKIE_USERNAME, $username, time() + 18000);
                
                header("Location: notes.php");
            }
        ?>
    </body>
</html>