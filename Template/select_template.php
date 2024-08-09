<?php if ($project['id'] == $taskTemplateConfig['project_id'] ?? '1') : ?>
    <div class="task-template-config">
        <?= $this->form->label(t('Modelos'), 'modelos') ?>
        <select id="template-select" style="height: 30px;">
            <option value="0"></option>
            <?php foreach ($templates as $template): ?>
                <option value="<?= $template['id'] ?>" <?= $template['default'] ? "selected" : "" ?>><?= $template['nome'] ?></option>
            <?php endforeach ?>
        </select>
    </div>
<?php endif; ?>