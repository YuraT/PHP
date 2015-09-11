<html>
    <body>
        <?php
            $servername = getenv("IP");
            $username = getenv("C9_USER");
            $password = "";
            $database = "c9";
            $dbport = 3306;
            
            $query = "SELECT * FROM users WHERE username = '" . $_POST["username"] . "' and password='" . $_POST["password"] . "'";
            
            $pdo = new PDO("mysql:host=" . $servername . ";dbname=" . $database, $username, $password);
            $statment = $pdo->query($query);
            $row = $statment->fetch(PDO::FETCH_ASSOC);
            $user_id = $row["ID"];
            
             if ($user_id === null) {
                header("Location: index.php");
            }
            else {
                
                //user_id cookie
                $cookie_user_id = "user_id";
                setcookie($cookie_user_id, $user_id, time() + 18000);
                
                //username cookie
                $cookie_username = "username";
                $username = $_POST["username"];
                setcookie($cookie_username, $username, time() + 18000);
                
                header("Location: notes.php");
            }
        ?>
    </body>
</html>