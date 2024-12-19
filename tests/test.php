<?php

use PHPUnit\Framework\TestCase;

class ProcessTest extends TestCase
{
    public function testPostValide()
    {
        $_SERVER['REQUEST_METHOD'] = 'POST';
        $_POST['name'] = 'Test task';
        $_POST['theme'] = 'Test theme';

        ob_start();
        require_once __DIR__ . '/../backend/process.php';
        $output = ob_get_clean();

        $this->assertStringContainsString('Tâche ajoutée avec succès', $output);
    }

    public function testChampsVides()
    {
        $_SERVER['REQUEST_METHOD'] = 'POST';
        $_POST['name'] = '';
        $_POST['theme'] = '';

        ob_start();
        require_once __DIR__ . '/../backend/process.php';
        $output = ob_get_clean();

        $this->assertStringContainsString('Veuillez remplir tous les champs', $output);
    }
}
