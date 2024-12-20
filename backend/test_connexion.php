<?php
$host = getenv('DB_HOST') ?: 'localhost';
$dbname = getenv('DB_NAME') ?: 'todolist';
$user = getenv('DB_USER') ?: 'postgres';
$password = getenv('DB_PASSWORD') ?: 'postgres';

try {
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);


    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);


    echo "<p style='color: green;'>Connexion réussie à la base de données PostgreSQL.</p>";
} catch (PDOException $e) {
    echo "<p style='color: red;'>Erreur de connexion : " . $e->getMessage() . "</p>";
}
?>
