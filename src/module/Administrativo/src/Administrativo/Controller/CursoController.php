<?php

namespace Administrativo\Controller;

use Administrativo\Form\CadastrarCurso;
use Administrativo\Form\ConsultarCurso;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Paginator\Paginator;
use Zend\Paginator\Adapter\ArrayAdapter;

abstract class CursoController extends AbstractActionController
{
    protected $em;
    protected $entity;
    protected $controller;
    protected $route;
    protected $service;
    protected $form;

    abstract function __construct();

    /**
     * Lista Resultados
     */
    public function indexAction()
    {
        $list = $this->getEm()->getRepository($this->entity)->findAll();
        $page = $this->params()->fromRoute('page');
        $paginator = new Paginator(new ArrayAdapter($list));
        $paginator->setCurrentPageNumber($page)->setDefaultItemCountPerPage(10);

        return new ViewModel(array('data' => $paginator, 'page' => $page));
    }

    /**
     * Inserir Registro
     */
    public function inserirAction()
    {
        if(is_string($this->form)){
            $form = new $this->form;
        }else{
            $form = $this->form;
        }

        $request = $this->getRequest();
        if($request->isPost()){
            $form->setData($request->getPost());

            if($form->isValid()){
                $service = $this->getServiceLocator()->get($this->service);

                if($service->save($request->getPost()->toArray())){
                    $this->flashMessenger()->addSuccessMessage('Cadastrado com sucesso !');
                }else{
                    $this->flashMessenger()->addErrorMessage('Nao foi possivel cadastrar !');
                }
                return $this->redirect()->toRoute($this->route, array('controller' => $this->controller));
            }
        }

        if($this->flashMessenger()->hasSuccessMessages()){
            return new ViewModel(array('form' => $form, 'success' => $this->flashMessenger()->getSuccessMessages()));
        }

        if($this->flashMessenger()->hasErrorMessages()){
            return new ViewModel(array('form' => $form, 'error' => $this->flashMessenger()->getErrorMessages()));
        }

        $this->flashMessenger()->clearMessages();

        return new ViewModel(array('form' => $form));
    }

    /**
     * Altera Registro
     */
    public function editarAction()
    {

        if(is_string($this->form)){
            $form = new $this->form;
        }else{
            $form = $this->form;
        }

        $request = $this->getRequest();
        $param = $this->params()->fromRoute('id', 0);
        $repository = $this->getEm()->getRepository($this->entity)->find($param);

        if($repository){

            if($request->isPost()){
                $form->setData($request->getPost());

                if($form->isValid()){
                    $service = $this->getServiceLocator()->get($this->service);
                    $data = $request->getPost()->toArray();
                    $data['id'] = (int) $param;

                    if($service->save($data)){
                        $this->flashMessenger()->addSuccessMessage('Alterado com sucesso !');
                    }else{
                        $this->flashMessenger()->addErrorMessage('Nao foi possivel alterar !');
                    }
                    return $this->redirect()->toRoute($this->route, array('controller' => $this->controller));
                }
            }else{
                $this->flashMessenger()->addInfoMessage('Registro nao encontrado !');
                return $this->redirect()->toRoute($this->route, array('controller' => $this->controller));
            }
        }

        if($this->flashMessenger()->hasSuccessMessages()){
            return new ViewModel(array('form' => $form, 'success' => $this->flashMessenger()->getSuccessMessages(), 'id' => $param));
        }

        if($this->flashMessenger()->hasErrorMessages()){
            return new ViewModel(array('form' => $form, 'error' => $this->flashMessenger()->getErrorMessages(), 'id' => $param));
        }
        if($this->flashMessenger()->hasInfoMessages()){
            return new ViewModel(array('form' => $form, 'warning' => $this->flashMessenger()->getInfoMessages(), 'id' => $param));
        }

        $this->flashMessenger()->clearMessages();

        return new ViewModel(array('form' => $form, 'id' => $param));
    }

    /**
     * Exclui Registro
     */
    public function excluirAction()
    {

        $service = $this->getServiceLocator()->get($this->service);
        $id = $this->params()->fromRoute('id', 0);

        if($service->remove(array('id' => $id))){
            $this->flashMessenger()->addSuccessMessage('Registro deletado !');
        }else{
            $this->flashMessenger()->addErrorMessage('Nao foi possivel deletar !');
        }
        return $this->redirect()->toRoute($this->route, array('controller' => $this->controller));
    }

    /**
     * @return array|object
     */
    public function getEm(){
        if($this->em == null){
            $this->em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        }
        return $this->em;
    }

//    public function cadastrarAction()
//    {
//        $form = new CadastrarCurso('Curso');
//        return new ViewModel(array('form' => $form));
//    }
//
//    public function consultarAction(){
//
//        $form = new ConsultarCurso('ConsultarCurso');
//        return new ViewModel(array('form' => $form));
//    }


}

