<?php
require_once __DIR__ . '/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $task = htmlspecialchars($_POST['name'] ?? '');
    $theme = htmlspecialchars($_POST['theme'] ?? '');

    if (!empty($task) && !empty($theme)) {
        $sql = "INSERT INTO todolist (task, theme) VALUES (:task, :theme)";
        $stmt = $pdo->prepare($sql);

        try {
            $stmt->execute([
                ':task' => $task,
                ':theme' => $theme,
            ]);
            
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    } else {
        echo "Veuillez remplir tous les champs.";
    }
} else {
    echo "Requête non valide.";
}

#header("Location: ../frontend/index.php");
#exit;