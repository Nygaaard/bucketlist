<?php
include("includes/config.php");

$db = new mysqli(DBHOST, DBUSER, DBPASS, DBDATABASE);

if(mysqli_connect_error()) {
    die("". $db->connect_error);
} else {
    echo "<h3>Anslutning lyckades!</h3>";
}

//Skapa tabell
$sql = "
DROP TABLE IF EXISTS bucketlist;
CREATE TABLE bucketlist(
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(64) NOT NULL,
    description TEXT NOT NULL,
    priority INT(1) NOT NULL,
    created_at timestamp NOT NULL DEFAULT current_timestamp()
);";

//Lägg till data
$sql .= "INSERT INTO bucketlist(name, description, priority) VALUES ('Bungyjump', 'Redlöst hoppa från en bro med ett elastiskt rep runt foten.', '1');";

//Skicka SQL-fråga till server
if($db->multi_query($sql)) {
    echo "Tabell skapad!";
} else {
    echo "Misslyckades att skapa tabell...";
}
