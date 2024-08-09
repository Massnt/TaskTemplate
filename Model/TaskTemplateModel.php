<?php

namespace Kanboard\Plugin\TaskTemplate\Model;

use Kanboard\Core\Base;

class TaskTemplateModel extends Base
{
    const TABLE = 'task_templates';

    public function createTemplate($values)
    {
        return $this->db->table(self::TABLE)->insert($values);
    }

    public function updateTemplate($id, $values)
    {
        return $this->db->table(self::TABLE)->eq('id', $id)->update($values);
    }

    public function removeTemplate($id)
    {
        return $this->db->table(self::TABLE)->eq('id', $id)->remove();
    }

    public function getAllTemplates()
    {
        return $this->db->table(self::TABLE)->findAll();
    }

    public function getTemplateById($template_id)
    {
        return $this->db->table(self::TABLE)->eq('id', $template_id)->findOne();
    }

    public function existeModelo()
    {
        return $this->db->table(self::TABLE)->exists();
    }
}
