<?php

namespace Kanboard\Plugin\TaskTemplate\Schema;

const VERSION = 1;

function version_1($pdo)
{
    $pdo->exec('
        CREATE TABLE IF NOT EXISTS task_templates (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            nome VARCHAR(255) NOT NULL,
            titulo VARCHAR(255) NOT NULL,
            descricao TEXT,
            `default` BOOLEAN
        )
    ');
}
