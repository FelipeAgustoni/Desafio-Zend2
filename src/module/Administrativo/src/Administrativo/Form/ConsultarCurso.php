<?php

namespace Administrativo\Form;

use Zend\Form\Element\Text;
use Zend\Form\Form;

class ConsultarCurso extends Form
{
    protected $_nome = "ConsultarCurso";

    public function __construct($name = null, $arrayOptions = array())
    {
        parent::__construct($this->_nome);

        $this->setAttributes(array(
            'id', $this->_nome,
            'name', $this->_nome,
            'class', $this->_nome,
        ));

        // Nome
        $nmCurso = new Text('nmCurso');
        $nmCurso->setLabel('Nome: ')->setAttributes(array(
            'class' => 'form-control',
            'title' => 'Informe o nome do curso',
            'data-toggle' => 'tooltip',
            'id' => 'nmCurso',
            'maxlength' => 100,
            'required' => true
        ))
            ->setLabelAttributes(array('class' => 'control-label'));
        $this->add($nmCurso);

        // Sigla
        $sgCurso = new Text('sgCurso');
        $sgCurso->setLabel('Sigla: ')->setAttributes(array(
            'class' => 'form-control',
            'title' => 'Sigla',
            'data-toggle' => 'tooltip',
            'id' => 'sgCurso',
            'maxlength' => 10,
            'required' => true
        ))
            ->setLabelAttributes(array('class' => 'control-label'));

        $this->add($sgCurso);


    }
}