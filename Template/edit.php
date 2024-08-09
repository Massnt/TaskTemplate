<div class="page-header">
    <h2><?= t('Editar Modelo de Chamado') ?></h2>
</div>
<form method="post" action="<?= $this->url->href('TemplateController', 'update', array('plugin' => 'TaskTemplate', 'id' => $template['id'])) ?>" autocomplete="off">
    <?= $this->form->csrf() ?>

    <?= $this->form->label(t('Nome do Modelo'), 'nome') ?>
    <?= $this->form->text('nome', $values, $errors, array('autofocus', 'required', 'tabindex="1"')) ?>

    <?= $this->form->label(t('Título'), 'titulo') ?>
    <?= $this->form->text('titulo', $values, $errors, array('autofocus', 'required', 'tabindex="1"')) ?>

    <?= $this->form->label(t('Descrição'), 'descricao') ?>
    <?= $this->form->textEditor('descricao', $values, $errors, array('tabindex' => 2)) ?>

    <?= $this->form->checkbox('default', t('Modelo Padrão'), 1, boolval($template['default'])) ?>

    <?= $this->modal->submitButtons() ?>
</form>
