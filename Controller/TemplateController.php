<?php

namespace Kanboard\Plugin\TaskTemplate\Controller;

use Kanboard\Controller\BaseController;

class TemplateController extends BaseController
{
    public function create(array $values = array(), array $errors = array())
    {
        $project = $this->getProject();

        $this->response->html($this->template->render('TaskTemplate:create', array(
            'plugin' => 'TaskTemplate',
            'values' => $values,
            'errors' => $errors,
            'project' => $project,
        )));
    }

    public function show(array $values = array(), array $errors = array())
    {
        $project = $this->getProject();

        $this->response->html($this->helper->layout->project('TaskTemplate:show', array(
            'owners' => $this->projectUserRoleModel->getAssignableUsersList($project['id'], true),
            'errors' => $errors,
            'task_templates' => $this->taskTemplateModel->getAllTemplates(),
            'project' => $project,
            'title' => t('Edit project')
        )));
    }

    public function save()
    {
        $project = $this->getProject();
        $values = $this->request->getValues();

        if(!isset($values['default'])){
            $values['default'] = 0;
        }

        list($valid, $errors) = $this->taskTemplateDataValidator->validate($values);

        if ($valid) {
            if ($this->taskTemplateModel->createTemplate($values) !== false) {
                $this->flash->success(t('Modelo criado com sucesso.'));
            } else {
                $this->flash->failure(t('Não foi possível criar o modelo.'));
            }
            $this->response->redirect($this->helper->url->to('TemplateController', 'show', array('project_id' => $project['id'])), true);
        } else {
            $this->create($values, $errors);
        }

    }

    public function edit(array $values = array(), array $errors = array())
    {
        $project = $this->getProject();
        $template = $this->taskTemplateModel->getTemplateById($this->request->getIntegerParam('id'));

        $this->response->html($this->template->render('TaskTemplate:edit', array(
            'plugin' => 'TaskTemplate',
            'values' => empty($values) ? $template : $values,
            'template' => $template,
            'errors' => $errors,
            'project' => $project,
        )));
    }

    public function update()
    {
        $values = $this->request->getValues();

        if(!isset($values['default'])){
            $values['default'] = 0;
        }

        list($valid, $errors) = $this->taskTemplateDataValidator->validate($values);

        if ($valid) {
            if ($this->taskTemplateModel->updateTemplate($this->request->getIntegerParam('id'), $values)) {
                $this->flash->success(t('Modelo atualizado com sucesso.'));
            } else {
                $this->flash->failure(t('Não foi possível atualizar modelo.'));
            }

            $this->response->redirect($this->helper->url->to('TemplateController', 'show', array()), true);
        } else {
            $this->edit($values, $errors);
        }
    }

    public function confirm()
    {
        $template = $this->taskTemplateModel->getTemplateById($this->request->getIntegerParam('id'));

        $this->response->html($this->template->render('TaskTemplate:remove', array(
            'plugin' => 'TaskTemplate',
            'template' => $template,
        )));
    }

    public function remove()
    {
        $this->checkCSRFParam();

        $template = $this->taskTemplateModel->getTemplateById($this->request->getIntegerParam('id'));

        if ($this->taskTemplateModel->removeTemplate($template['id'])) {
            $this->flash->success(t('Modelo removido com sucesso.'));
        } else {
            $this->flash->failure(t('Não foi possível remover o modelo.'));
        }

        $this->response->redirect($this->helper->url->to('TemplateController', 'show', array()), true);
    }

    public function existeModelo()
    {
        return $this->taskTemplateModel->existeModelo();
    }

    public function getTemplate()
    {
        $template = $this->taskTemplateModel->getTemplateById($this->request->getIntegerParam('id'));
        $this->response->json($template);
    }
}
