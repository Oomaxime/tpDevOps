<?php
// Informations de connexion
$host = getenv('DB_HOST') ?: 'localhost';
$dbname = getenv('DB_NAME') ?: 'todolist';
$user = getenv('DB_USER') ?: 'postgres';
$password = getenv('DB_PASSWORD') ?: 'postgres';

try {
    // Tentative de connexion
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);

    // Configuration des options PDO
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Gestion des erreurs
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); // Mode de récupération

    // Message de succès
    echo "<p style='color: green;'>Connexion réussie à la base de données PostgreSQL.</p>";
} catch (PDOException $e) {
    // Message en cas d'erreur
    echo "<p style='color: red;'>Erreur de connexion : " . $e->getMessage() . "</p>";
}
?>
