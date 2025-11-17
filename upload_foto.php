<?php
require 'config/config.php';

// Controleer of het formulier is verzonden via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Haal gegevens op uit het formulier
    $activiteit_id = $_POST['activiteit_id'] ?? null;
    $alttekst = $_POST['alttekst'] ?? '';
    $foto_naam = $_FILES['filename']['name'] ?? '';
    $foto_tmp = $_FILES['filename']['tmp_name'] ?? '';

    // Controleer of alle vereiste velden zijn ingevuld
    if ($activiteit_id && $foto_naam && $alttekst) {
        // Zorg dat de uploadmap bestaat
        $upload_map = 'uploads/';
        if (!is_dir($upload_map)) {
            mkdir($upload_map, 0755, true);
        }

        // Verplaats het bestand naar de uploadmap
        $bestemming = $upload_map . basename($foto_naam);
        if (move_uploaded_file($foto_tmp, $bestemming)) {
            // Voeg de foto toe aan de database
            $stmt = $pdo->prepare("INSERT INTO foto (activiteit_id, url, alttekst) VALUES (?, ?, ?)");
$stmt->execute([$activiteit_id, $foto_naam, $alttekst]);


            echo "<p style='text-align:center; font-weight:bold;'>✅ Foto succesvol geüpload en gekoppeld aan activiteit!</p>";
        } else {
            echo "<p style='text-align:center; color:red;'>⚠️ Fout bij het uploaden van de foto.</p>";
        }
    } else {
        echo "<p style='text-align:center; color:red;'>⚠️ Vul alle velden in en kies een foto.</p>";
    }
} else {
    echo "<p style='text-align:center;'>⛔ Ongeldige aanvraag.</p>";
}
?>
