<?php
require 'config/config.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    echo "Geen activiteit geselecteerd.";
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM activiteit WHERE id = ?");
$stmt->execute([$id]);
$activiteit = $stmt->fetch();

if (!$activiteit) {
    echo "Activiteit niet gevonden.";
    exit;
}
?>

<h1><?php echo htmlspecialchars($activiteit['titel']); ?></h1>
<p><?php echo htmlspecialchars($activiteit['omschrijving']); ?></p>
<img src="afbeeldingen/<?php echo htmlspecialchars($activiteit['foto']); ?>" alt="<?php echo htmlspecialchars($activiteit['titel']); ?>">
