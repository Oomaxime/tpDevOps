<?php
// Informations de connexion
$host = 'localhost';        // Hôte PostgreSQL (peut être localhost ou l'adresse IP)
$dbname = 'todolist';       // Nom de la base de données
$user = 'postgres';         // Nom d'utilisateur PostgreSQL
$password = 'postgres'; // Mot de passe PostgreSQL

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
