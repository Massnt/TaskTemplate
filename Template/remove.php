<div class="page-header">
    <h2><?= t('Modelo de Tarefa') ?></h2>
</div>

<div class="confirm">
    <p class="alert alert-info">
        <?= t('Você desejar remover o Modelo? "%s"', $template['titulo']) ?>
    </p>

    <?= $this->modal->confirmButtons(
        'TemplateController',
        'remove',
        array('plugin' => 'TaskTemplate','id' => $template['id'])
    ) ?>
</div>
