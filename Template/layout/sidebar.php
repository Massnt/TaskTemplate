<?php if ($project['id'] == $taskTemplateConfig['project_id'] ?? '1') : ?>
    <li
        <?= $this->app->checkMenuSelection('TemplateController') ?>>
        <?= $this->url->link(t('Modelos de Tarefas'), 'TemplateController', 'show', array('plugin' => 'TaskTemplate', 'project_id' => $project['id'])) ?>
    </li>
<?php endif; ?>