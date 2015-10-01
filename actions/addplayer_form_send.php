<?php
    include("../includes/db.php");
    $name = $conn->real_escape_string($_POST["name"]);
    $surname = $conn->real_escape_string($_POST["surname"]);
    $short = $conn->real_escape_string($_POST["short"]);
    $nickname = $conn->real_escape_string($_POST["nickname"]);

    if ($conn->query("INSERT into players (`player_name`, `player_surname`, `player_short`, `player_nick`) VALUES ('$name', '$surname', '$short', '$nickname')")) {
    $succesfullyAdded = "Dodano zawodnika.";
    }
?>