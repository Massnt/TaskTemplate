<?php

namespace Kanboard\Plugin\TaskTemplate\Validator;

use SimpleValidator\Validator;
use SimpleValidator\Validators;
use Kanboard\Validator\BaseValidator;

class TaskTemplateDataValidator extends BaseValidator
{
    public function validate(array $values)
    {
        $v = new Validator($values, array(
            new Validators\Required('nome', t('Este campo é obrigatório')),
            new Validators\Required('titulo', t('Este campo é obrigatório')),
            new Validators\Required('descricao', t('Este campo é obrigatório')),
        ));

        return array(
            $v->execute(),
            $v->getErrors()
        );
    }
}