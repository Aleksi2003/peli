<?php
// Luodaan tietokantayhteys
$db = new PDO('sqlite:esimerkki.db');

// Tarkistetaan, onko lomake lähetetty
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nimi = $_POST['nimi'];
    if (!empty($nimi)) {
        // Lisätään nimi tietokantaan
        $stmt = $db->prepare("INSERT INTO ihmiset (nimi) VALUES (:nimi)");
        $stmt->bindValue(':nimi', $nimi);
        $stmt->execute();
    }
}

// Haetaan kaikki nimet tietokannasta
$kysely = $db->query("SELECT * FROM ihmiset");
$ihmiset = $kysely->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8" />
    <title>SQLite PHP Demo</title>
</head>
<body>
    <h1>Lisää nimi</h1>
    <form method="post" action="">
        <input type="text" name="nimi" placeholder="Kirjoita nimi" required />
        <button type="submit">Lisää</button>
    </form>

    <h2>Rekisteröidyt nimet:</h2>
    <ul>
        <?php foreach ($ihmiset as $ihminen): ?>
            <li><?= htmlspecialchars($ihminen['nimi']) ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
