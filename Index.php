<?php
// Bepaal welke pagina geladen moet worden
$pagina = $_GET["pagina"] ?? "home";

// Whitelist van toegestane pagina’s
$toegestanePaginas = ["home", "activiteit", "student", "foto", "score", "reactie", "login"];
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Studenten Activiteiten App</title>
    <link rel="stylesheet" href="stijl.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>

    <?php include 'nav.php'; ?>

    <main>
        <?php
        if (in_array($pagina, $toegestanePaginas)) {
            if ($pagina === "home") {
                // Inhoud van de homepage
                echo '
                <h2 style="text-align: center; border-radius: 5px;">Studenten Activiteiten App</h2>
                <div class="welkom">
                    Welkom! Hier kun je activiteiten bekijken, scores geven en foto\'s delen.
                </div>
                <div class="knoppen">
                    <a href="index.php?pagina=student" class="knop">Bekijk Studenten</a>
                    <a href="index.php?pagina=foto" class="knop">Bekijk Foto\'s</a>
                    <a href="index.php?pagina=score" class="knop">Bekijk Scores</a>
                    <a href="index.php?pagina=reactie" class="knop">Bekijk Reacties</a>
                </div>
                <div class="laatste-activiteit">
                    <h3>Laatste Activiteit</h3>
                    <p>Bekijk de nieuwste activiteiten die door studenten zijn toegevoegd.</p>
                    <a href="index.php?pagina=activiteit">Bekijk Activiteiten</a>
                </div>';
            } else {
                // Laad de juiste pagina
                $bestand = $pagina . ".php";
                if (file_exists($bestand)) {
                    include $bestand;
                } else {
                    echo "<p style='color:red;'>Bestand '$bestand' niet gevonden.</p>";
                }
            }
        } else {
            echo "<p style='color:red;'>Ongeldige pagina opgegeven.</p>";
        }
        ?>
    </main>

    <footer>
        <p>&copy; 2025 Studenten Activiteiten App</p>
    </footer>

</body>
</html>
