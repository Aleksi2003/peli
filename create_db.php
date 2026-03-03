<?php
// Luodaan SQLite-tietokanta ja taulu, jos ei vielä ole olemassa
$db = new PDO('sqlite:esimerkki.db');

$db->exec("CREATE TABLE IF NOT EXISTS ihmiset (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    nimi TEXT
)");
?>
