<?php
require 'config/config.php';

// Query alle activiteiten uit database
$stmt = $pdo->query("SELECT * FROM activiteit");
$activiteiten = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stijl.css">
    <title>Activiteiten</title>
</head>
<body>
  
    

    <h2 style="text-align: center; border-radius: 5px;">Activiteiten</h2>
    
    <div class="knopje toevoegen-activiteit">
        <a href="toevoegen_activiteit.php" style="text-decoration: none; color: #000;">Voeg Nieuwe Activiteit Toe</a>
    </div>

    <style>
        body {
            background: #F5F5F5;
            font-family: 'Arial Rounded MT Bold', Arial, sans-serif;
        }
        .activiteiten-tabel {
            width: 95%;
            margin: 30px auto;
            border-collapse: collapse;
            background: #16C8F8;
            font-size: 1.15em;
            box-sizing: border-box;
            border: 2px solid #1d9fc3;
        }
        .activiteiten-tabel th, .activiteiten-tabel td {
            border: 2px solid #1d9fc3;
            padding: 22px 8px;
            text-align: center;
        }
        .activiteiten-tabel th {
            background: #0bdcf7;
            color: #171717;
            font-size: 1.5em;
            font-weight: bold;
            letter-spacing: 1px;
        }
        .activiteiten-tabel tr {
            transition: background 0.2s;
        }
        .activiteiten-tabel tr:hover {
            background: #36e2fd;
        }
        .bekijken-knop {
            background: #16C8F8;
            color: #04060b;
            border: 2px solid #1d9fc3;
            padding: 10px 28px;
            border-radius: 8px;
            font-weight: bold;
            font-size: 1em;
            cursor: pointer;
            transition: background 0.2s, color 0.2s;
        }
        .bekijken-knop:hover {
            background: #0f8fa0ff;
            color: #171717;
        }
    </style>


    <table class="activiteiten-tabel">
        <thead>
            <tr>
                <th style="width:30%;">Title</th>
                <th style="width:50%;">Beschrijving</th>
                <th style="width:20%;">Details</th>
            </tr>
        </thead>
        <tbody>
    <?php foreach ($activiteiten as $activiteit): ?>
        <tr>
            <td><?php echo htmlspecialchars($activiteit['titel']); ?></td>
            <td><?php echo htmlspecialchars($activiteit['omschrijving']); ?></td>
            <td>
    <a href="activiteit_fotos.php?id=<?php echo $activiteit['id']; ?>">
        <button class="bekijken-knop">Foto's bekijken</button>
    </a>
</td>

        </tr>
    <?php endforeach; ?>
</tbody>

    </table>

</body>


</html>