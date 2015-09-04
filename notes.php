<html>
    <body>
        <?php
        
            $servername = getenv("IP");
            $username = getenv ("C9_USER");
            $password = "";
            $database = "c9";
            $dbport = 3306;
            
            $query = "SELECT * FROM users WHERE username = '" . $_POST["username"] . "' and password='" . $_POST["password"] . "'";
            echo $query;
            
            $pdo = new PDO("mysql:host=" . $servername . ";dbname=" . $database, $username, $password);
            $statment = $pdo->query($query);
            echo "<table border=1>";
            $row = $statment->fetch(PDO::FETCH_ASSOC);
            $user_id = $row["ID"];
            
            echo "</table>";
        
            echo "Welcome" . " " . $_POST["username"]; 
            echo "<br />Your password is: " . $_POST["password"] . "<br /><br /><br />";
            
            echo "Your id is : " . $user_id . "<br /><br /><br />";
            
            $query = "SELECT * FROM notes WHERE user_ID ='" . $user_id . "'";
            $statment = $pdo->query($query);
            
            while ($row = $statment->fetch(PDO::FETCH_ASSOC)) {
                echo $row["notes_text"];
            }
        ?>
    </body>
</html>