<!doctype html>
<html>
    <head>
        <meta charset="utf-8" />
        <link href='https://fonts.googleapis.com/css?family=Slabo+27px' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Corben:700' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="style.css" type="text/css" />
        <title>PHP</title>
    </head>
    
    <body>
        <?php
        // A simple web site in Cloud9 that runs through Apache
        // Press the 'Run' button on the top to start the web server,
        // then click the URL that is emitted to the Output tab of the console
        // echo "ааа";
        
        echo '<h1>About Months</h1>';
        
        $servername = getenv("IP");
        $username = getenv ("C9_USER");
        $password = "";
        $database = "c9";
        $dbport = 3306;
        
        $pdo = new PDO("mysql:host=" . $servername . ";dbname=" . $database, $username, $password);
        $statment = $pdo->query("SELECT * FROM months");
        echo "<table border=1>";
        while ($row = $statment->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>" . "<td>" . $row["id"] . "</td>" . "<td>" . $row["season"] . "</td>" . "<td>" . "month =" . " " . $row["month"] . "</td>" . "<td>" . "number of days: " . $row["number_of_days"] . "\n" . "</td>" . "</tr>";
        }
        echo "</table>";
        ?>
        <br />
        <br />
        <br />
        
        <form action="notes.php" method="post">
            <input type="text" name="username" placeholder="username" />
            <input type="password" name="password" placeholder="password"/>
            <input type="submit" value="Log In" />
        </form>
    </body>
</html>