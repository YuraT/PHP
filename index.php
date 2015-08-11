<!doctype <!DOCTYPE html>
<html>
    <head>
        <title>PHP</title>
    </head>
    
    <body>
<?php
// A simple web site in Cloud9 that runs through Apache
// Press the 'Run' button on the top to start the web server,
// then click the URL that is emitted to the Output tab of the console


echo '<h1>Hello World</h1>';

$servername = getenv("IP");
$username = getenv ("C9_USER");
$password = "";
$database = "c9";
$dbport = 3306;

$db = new mysqli($servername, $username, $password, $database, $dbport);


if ($db->connect_error) {
    die("Connection failed" . $db->connect_error);
}
else {
    echo "Connected successfully (".$db->host_info.")";
}

$res = $db->query("SELECT * FROM months");

echo "<table>";
$res->data_seek(0);
while ($row = $res->fetch_assoc()) {
    echo "<tr>" . "<td>" . "month =" . " " . $row["month"] . "</td>" . "<td>" . "number of days: " . $row["number_of_days"] . "\n" . "</td>" . "</tr>";
}
echo "</table>";
?>
    </body>
</html>