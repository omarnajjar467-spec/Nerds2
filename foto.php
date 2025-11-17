<?php
require 'config/config.php';

// Query alle activiteiten uit database
$stmt = $pdo->query("SELECT * FROM activiteit");
$activiteiten = $stmt->fetchAll();

// Controleer of een activiteit gekozen is
$bericht = "";
if (isset($_POST['activiteit_id'])) {
    $gekozen_id = $_POST['activiteit_id'];
    $stmt = $pdo->prepare("SELECT titel FROM activiteit WHERE id = ?");
    $stmt->execute([$gekozen_id]);
    $activiteit = $stmt->fetch();

    if ($activiteit) {
        $bericht = "Je hebt gekozen voor <strong>" . htmlspecialchars($activiteit['titel']) . "</strong>. Upload hier je foto!";
    } else {
        $bericht = "Activiteit niet gevonden.";
    }
}
?>


<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stijl.css">
    <title>Foto's</title>

    <style>
        body {
            background: #F5F5F5;
            font-family: Arial, sans-serif;
        }
        .dropdown, .uploaden, .alttekst {
            margin: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 500px;
            background-color: #16C8F8;
        }
        .rechthoek {
            margin: 20px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 95%;
            background-color: #16C8F8;
            margin-top: 50px;   
        }
        button {
            background-color: #0bdcf7;
            border: none;
            padding: 10px 20px;
            font-size: 1em;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }
        button:hover {
            background-color: #0f8fa0;
            color: white;
        }
    </style>
</head>

<body>


<h2 style="text-align: center; border-radius: 5px;">Foto's</h2>

<!-- Dropdown formulier -->
<form method="POST" action="upload_foto.php" enctype="multipart/form-data" style="text-align:center;">
    <div class="dropdown">
        <label for="activiteit">Kies activiteit</label><br><br>
        <select name="activiteit_id" id="activiteit" required>
            <option value="">-- Kies een activiteit --</option>
            <?php foreach ($activiteiten as $activiteit): ?>
                <option value="<?php echo $activiteit['id']; ?>">
                    <?php echo htmlspecialchars($activiteit['titel']); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    

       

<!-- Toon resultaat met switch -->
<div class="rechthoek">
    <?php 
    if ($bericht != "") {
        echo "<p style='font-size:1.2em; text-align:center;'>$bericht</p>";
    } else {
        echo "<p style='text-align:center;'>Kies een activiteit hierboven om te beginnen.</p>";
    }
    ?>
</div>

<h2 style="text-align: center; border-radius: 5px;">Nieuwe foto uploaden</h2>

<form method="POST" action="upload_foto.php" enctype="multipart/form-data" style="text-align:center;">
    <div class="uploaden">
        <input type="file" id="myFile" name="filename" required>
    </div>

    <div class="alttekst">
        <label for="alttekst">Alt-tekst foto:</label><br>
        <input type="text" id="alttekst" name="alttekst" value="" required><br><br>
    </div>

    <div class="uploaden">
        <button type="submit">Uploaden</button>
    </div>
</form>



</body>
</html>
