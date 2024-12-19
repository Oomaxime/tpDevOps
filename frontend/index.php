<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
<section>
    <form class="form_task" method="post" action="../backend/process.php">
        <div class="Input_class">
            <label for="Name">Names :</label>
            <input name="name" id="Name" type="text" placeholder="Name of task">
        </div>
        <div class="Input_class">
            <label for="Theme">Theme :</label>
            <input name="theme" id="Theme" type="text" placeholder="Theme of task">
        </div>
        <button>Create Task</button>
    </form>
</section>

<section class="task">
    <div class="new_task">
        <div class="paragraph_names">
            <p>Name Task :</p>
            <p class="Task_names">Faire les dockersFiles</p>
        </div>
        <div class="paragraph_names">
            <p>Theme :</p>
            <p class="Theme">Boulot</p>
        </div>
        <div>
            <label for="validate">Validé / non-validé</label>
            <input id="validate" type="checkbox">
        </div>
    </div>
</section>
</body>
</html>
