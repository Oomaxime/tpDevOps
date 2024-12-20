<?php
require_once __DIR__ . '/../backend/config.php';

function displayResult($testName, $condition) {
    if ($condition) {
        echo "<p style='color: green;'> $testName : Réussi</p>";
    } else {
        echo "<p style='color: red;'> $testName : Échoué</p>";
    }
}

function testAjoutTacheValide($pdo) {

    $pdo->exec("TRUNCATE TABLE todolist");

    $_SERVER['REQUEST_METHOD'] = 'POST';
    $_POST['name'] = 'Tâche Test';
    $_POST['theme'] = 'Test';

    ob_start();
    require __DIR__ . '/../backend/process.php';
    $output = ob_get_clean();


    $successMessage = strpos($output, 'Tâche ajoutée avec succès') !== false;

    $stmt = $pdo->query("SELECT * FROM todolist WHERE task = 'Tâche Test' AND theme = 'Test'");
    $taskExists = $stmt->fetch(PDO::FETCH_ASSOC) !== false;

    return $successMessage && $taskExists;
}

function testChampsVides($pdo) {
    $_SERVER['REQUEST_METHOD'] = 'POST';
    $_POST['name'] = '';
    $_POST['theme'] = '';

    ob_start();
    require __DIR__ . '/../backend/process.php';
    $output = ob_get_clean();

    return strpos($output, 'Veuillez remplir tous les champs') !== false;
}


function testAffichageTaches($pdo) {

    $pdo->exec("INSERT INTO todolist (task, theme, state) VALUES ('Tâche Test', 'Test', FALSE)");


    ob_start();
    require __DIR__ . '/../frontend/index.php';
    $output = ob_get_clean();

    return strpos($output, 'Tâche Test') !== false && strpos($output, 'Test') !== false;
}


echo "<h1>Résultats des tests</h1>";
displayResult('Test Ajout Tâche Valide', testAjoutTacheValide($pdo));
displayResult('Test Champs Vides', testChampsVides($pdo));
displayResult('Test Affichage Tâches', testAffichageTaches($pdo));
?>