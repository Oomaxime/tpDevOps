<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionnaire de Tâches</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <header>
        <h1>Bienvenue dans le Gestionnaire de Tâches</h1>
        <p>Organisez et gérez vos tâches efficacement.</p>
    </header>
    <main>
        <section class="task-form">
            <h2>Créer une Nouvelle Tâche</h2>
            <form method="post" action="">
                <div class="form-group">
                    <label for="Name">Nom de la Tâche :</label>
                    <input id="Name" name="task_name" type="text" placeholder="Saisissez le nom de la tâche" required>
                </div>
                <div class="form-group">
                    <label for="Theme">Thème de la Tâche :</label>
                    <input id="Theme" name="task_theme" type="text" placeholder="Saisissez le thème de la tâche" required>
                </div>
                <button type="submit">Créer la Tâche</button>
            </form>
        </section>
        <section class="task-list">
            <h2>Vos Tâches</h2>
            <?php
            require_once '../backend/config.php';

            try {
                $stmt = $pdo->query("SELECT * FROM todolist");
                $tasks = $stmt->fetchAll();

                if ($tasks) {
                    foreach ($tasks as $task) {
                        ?>
                        <div class="task-item">
                            <div class="task-details">
                                <p><strong>Nom de la Tâche :</strong> <?= htmlspecialchars($task['task']) ?></p>
                                <p><strong>Thème :</strong> <?= htmlspecialchars($task['theme']) ?></p>
                            </div>
                            <div class="task-status">
                                <label for="validate_<?= htmlspecialchars($task['id']) ?>">Terminée :</label>
                                <input 
                                    id="validate_<?= htmlspecialchars($task['id']) ?>" 
                                    type="checkbox" 
                                    <?= $task['state'] ? 'checked' : '' ?> 
                                    disabled>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    echo "<p>Aucune tâche trouvée. Créez une nouvelle tâche pour commencer !</p>";
                }
            } catch (PDOException $e) {
                echo "<p>Erreur lors de la récupération des tâches : " . htmlspecialchars($e->getMessage()) . "</p>";
            }
            ?>
        </section>
    </main>
    <footer>
        <p>&copy; <?= date('Y') ?> Gestionnaire de Tâches. Tous droits réservés.</p>
    </footer>
</body>
</html>

