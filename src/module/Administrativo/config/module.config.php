<?php
/**
 * Created by PhpStorm.
 * User: felipe.agustoni
 * Date: 14/06/2017
 * Time: 16:44
 */

return array(
    'router' => array(
        'routes' => array(
            'administrativo' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/',
                    'defaults' => array(
                        'controller' => 'Administrativo\Controller\Curso',
                        'action' => 'consultar',
                    ),
                ),
            ),
            'cadastrar' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/cadastrar',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Administrativo\Controller',
                        'controller'    => 'Curso',
                        'action'        => 'cadastrar',
                    ),
                ),
                'may_terminate' => 'true',
                'child_routes' => array(
                    'default' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/[:action]',
                            'constraints' => array(
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Administrativo\Controller\Curso' => 'Administrativo\Controller\CursoController',
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
);
