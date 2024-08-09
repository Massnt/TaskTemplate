<div class="page-header">
    <h2><?= t('Modelos de Tarefas') ?></h2>
    <ul>
        <li>
            <?= $this->modal->medium('plus', t('Adicionar modelo de tarefa'), 'TemplateController', 'create', array('plugin' => 'TaskTemplate', 'project_id' => $project['id'])) ?>
        </li>
    </ul>
</div>

<?php if (! empty($task_templates)): ?>
    <h3><?= t('Modelos de Tarefas Existentes') ?></h3>
    <table>
        <?php foreach ($task_templates as $template): ?>
            <tr>
                <td>
                    <div class="dropdown">
                        <a href="#" class="dropdown-menu dropdown-menu-link-icon"><i class="fa fa-cog"></i><i class="fa fa-caret-down"></i></a>
                        <ul>
                            <li>
                                <?= $this->modal->medium('edit', t('Edit'), 'TemplateController', 'edit', array('plugin' => 'TaskTemplate','project_id' => $project['id'], 'id' => $template['id'])) ?>
                            </li>
                            <li>
                                <?= $this->modal->confirm('trash-o', t('Remove'), 'TemplateController', 'confirm', array('plugin' => 'TaskTemplate', 'id' => $template['id'])) ?>
                            </li>
                        </ul>
                    </div>
                    <?= $this->text->e($template['nome']) ?>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
<?php endif ?>