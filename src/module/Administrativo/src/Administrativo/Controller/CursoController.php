<?php

namespace Administrativo\Controller;

use Administrativo\Form\CadastrarCurso;
use Administrativo\Form\ConsultarCurso;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class CursoController extends AbstractActionController
{

    public function cadastrarAction()
    {
        $form = new CadastrarCurso('Curso');
        return new ViewModel(array('form' => $form));
    }

    public function save(){

    }

    public function remove(){

    }

    public function consultarAction(){

        $form = new ConsultarCurso('ConsultarCurso');
        return new ViewModel(array('form' => $form));
    }


}

