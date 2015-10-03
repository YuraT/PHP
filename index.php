<!doctype html>
<html>
    <head>
        <meta charset="utf-8" />
        <link href='https://fonts.googleapis.com/css?family=Slabo+27px' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="style.css" type="text/css" />
        <title>PHP</title>
    </head>
    
    <body>
        <?php
        // A simple web site in Cloud9 that runs through Apache
        // Press the 'Run' button on the top to start the web server,
        // then click the URL that is emitted to the Output tab of the console
        include_once("function.php");
        $pdo = connect_pdo();
        
        echo '<h1>About Months</h1>';
        
        
        $statment = $pdo->query("SELECT * FROM months");
        echo "<table border=1>";
        while ($row = $statment->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>" . "<td>" . $row["id"] . "</td>" . "<td>" . $row["season"] . "</td>" . "<td>" . "month =" . " " . $row["month"] . "</td>" . "<td>" . "number of days: " . $row["number_of_days"] . "\n" . "</td>" . "</tr>";
        }
        echo "</table>" . "<br />" . $_COOKIE[COOKIE_USER_ID];
        ?>
        <br />
        <br />
        <br />
        
        <h2>Log In</h2>
        <form action="login.php" method="post">
            <input type="text" name="username" placeholder="username" />
            <input type="password" name="password" placeholder="password" />
            <input type="submit" value="Log In" />
        </form>
        
        <h2>Register</h2>
        <form action="register.php" method="post">
            <input type="text" name="name" placeholder="username" required/>
            <input type="password" name="password" placeholder="password" required/>
            <input type="password" name="password_repeat" placeholder="repeat password" required/>
            <input type="submit" value="Register" />
        </form>
    </body>
</html>