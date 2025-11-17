<?php
require 'config/config.php';

// Haal activiteit-ID op uit de URL
$activiteit_id = $_GET['id'] ?? null;

if (!$activiteit_id) {
    echo "Geen activiteit gekozen.";
    exit;
}

// Haal activiteit op
$stmt = $pdo->prepare("SELECT * FROM activiteit WHERE id = ?");
$stmt->execute([$activiteit_id]);
$activiteit = $stmt->fetch();

if (!$activiteit) {
    echo "Activiteit niet gevonden.";
    exit;
}

// Haal foto's op die bij deze activiteit horen
$stmt = $pdo->prepare("SELECT * FROM foto WHERE activiteit_id = ?");
$stmt->execute([$activiteit_id]);
$fotos = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Foto's van <?php echo htmlspecialchars($activiteit['titel']); ?></title>
    <link rel="stylesheet" href="stijl.css">
    <style>
        .galerij {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
            margin-top: 30px;
        }
        .foto-kaart {
            background: #fff;
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 10px;
            width: 250px;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .foto-kaart img {
            width: 100%;
            height: auto;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<h2 style="text-align:center;">Foto's van <?php echo htmlspecialchars($activiteit['titel']); ?></h2>

<div class="galerij">
    <?php if (count($fotos) > 0): ?>
        <?php foreach ($fotos as $foto): ?>
            <div class="foto-kaart">
    <img src="uploads/<?php echo htmlspecialchars($foto['url']); ?>" alt="<?php echo htmlspecialchars($foto['alttekst']); ?>">
    <p><strong>Alt-tekst:</strong> <?php echo htmlspecialchars($foto['alttekst']); ?></p>
    <p><strong>Uploaddatum:</strong> <?php echo date('d-m-Y H:i', strtotime($foto['datum'])); ?></p>
</div>

        <?php endforeach; ?>
    <?php else: ?>
        <p style="text-align:center;">Er zijn nog geen foto's geüpload voor deze activiteit.</p>
    <?php endif; ?>
</div>

</body>
</html>
