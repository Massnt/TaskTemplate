<?php

namespace Kanboard\Plugin\TaskTemplate;

use Kanboard\Core\Plugin\Base;
use Kanboard\Plugin\TaskTemplate\Model\TaskTemplateModel;

class Plugin extends Base
{
    public function initialize()
    {
        global $revisarTaskConfig;

        if (file_exists('plugins/TaskTemplate/config.php'))
        {
            require_once('plugins/TaskTemplate/config.php');
        }

        $this->template->hook->attach('template:project:sidebar', 'TaskTemplate:layout/sidebar', [
            'revisarTaskConfig' => $revisarTaskConfig
        ]);

        $this->template->hook->attach('template:task:form:first-column', 'TaskTemplate:select_template', [
            'templates' => $this->taskTemplateModel->getAllTemplates()
        ]);
        $this->hook->on('template:layout:js', ['template' => 'plugins/TaskTemplate/Assets/js/taskTemplate.js']);
        $this->hook->on('template:layout:js', ['template' => 'plugins/TaskTemplate/Assets/js/defaultTaskTemplate.js']);
    }

    public function getClasses()
    {
        return [
            'Plugin\TaskTemplate\Model' => [
                'TaskTemplateModel',
            ],
            'Plugin\TaskTemplate\Validator' => array('TaskTemplateDataValidator')
        ];
    }

    public function getPluginName()
    {
        return 'TaskTemplate';
    }

    public function getPluginDescription()
    {
        return 'Permite a criação de templates para as tasks com título predefinido, descrição, e cor.';
    }

    public function getPluginAuthor()
    {
        return 'Mateus S.S';
    }

    public function getPluginVersion()
    {
        return '1.0.0';
    }

    public function getPluginHomepage()
    {
        return 'https://github.com/Massnt/TaskTemplate.git';
    }
}
