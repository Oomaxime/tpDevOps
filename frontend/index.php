<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notre liste</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <section>
        <form class="form_task" method="post" action="">
            <div class="Input_class">
                <label for="Name">Names :</label>
                <input id="Name" type="text" placeholder="Name of task">
            </div>
            <div class="Input_class">
                <label for="Theme"> :</label>
                <input id="Theme" type="text" placeholder="Theme of task">
            </div>
            <button>Crée ici une tache</button>
        </form>
    </section>

    <section class="task">
        <?php
        $tasks = [
            ['name' => 'Faire les dockersFiles', 'theme' => 'Boulot', 'state' => true],
            ['name' => 'Préparer la réunion', 'theme' => 'Travail', 'state' => false],
            ['name' => 'Planifier le projet', 'theme' => 'Équipe', 'state' => true],
        ];

        foreach ($tasks as $task) {
            ?>
            <div class="new_task">
                <div class="paragraph_names">
                    <p>Name Task :</p>
                    <p class="Task_names"><?= htmlspecialchars($task['name']) ?></p>
                </div>
                <div class="paragraph_names">
                    <p>Theme :</p>
                    <p class="Theme"><?= htmlspecialchars($task['theme']) ?></p>
                </div>
                <div>
                    <label for="validate_<?= htmlspecialchars($task['name']) ?>">Validé / non-validé</label>
                    <input 
                        id="validate_<?= htmlspecialchars($task['name']) ?>" 
                        type="checkbox" 
                        <?= $task['state'] ? 'checked' : '' ?>
                    >
                </div>
            </div>
            <?php
        }
        ?>
    </section>
</body>
</html>