<?php

namespace Kanboard\Plugin\TaskTemplate\Schema;

const VERSION = 2;

function version_1($pdo)
{
    $pdo->exec('
        CREATE TABLE IF NOT EXISTS task_templates (
            `id` INT AUTO_INCREMENT PRIMARY KEY,
            `nome` VARCHAR(255) NOT NULL,
            `titulo` VARCHAR(255) NOT NULL,
            `descricao` TEXT,
            `default` BOOLEAN
        )
    ');
}

function version_2($pdo)
{
    $pdo->exec('ALTER TABLE task_templates ADD `default` BOOLEAN');
}

