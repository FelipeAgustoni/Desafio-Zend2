<?php

/**
 * Created by PhpStorm.
 * User: felipe.agustoni
 * Date: 19/06/2017
 * Time: 10:36
 */

namespace Administrativo\Entity;

use Zend\Stdlib\Hydrator\ClassMethods;

/**
 * Curso
 * @ORM\Entity
 * @ORM\Table(name="DESAFIO-ZF.TB_CURSO")
 * @ORM\Entity(repositoryClass="Administrativo\Entity\Repository\CursoRepository")
 */
class Curso
{

    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(name="id_curso", type="integer", nullable=false)
     */
    private $idCurso;

    /**
     * @var string
     * @ORM\Column(name="nm_curso", type="string", length=100, nullable=false)
     */
    private $nmCurso;

    /**
     * @var int
     * @ORM\Column(name="nu_carga_horario", type="integer", length=4, nullable=false)
     */
    private $nuCargaHorario;

    /**
     * @var string
     * @ORM\Column(name="sg_curso", type="string", length=10, nullable=false)
     */
    private $sgCurso;

    protected $associations = array();

    public function __construct(array $options = array())
    {
        $hydrator = new ClassMethods;
        $hydrator->hydrate($options, $this);
    }

    public function toArray()
    {
        $hydrator = new ClassMethods();
        return $hydrator->extract($this);
    }

    public function getAssociations()
    {
        return $this->associations;
    }

    public function resolveAssociations($entityManager)
    {
        $associations = $this->getAssociations();
        foreach ($associations as $class => $columns) {
            foreach ($columns as $column) {
                $methodGet = 'get' . ucfirst($column);
                $methodSet = 'set' . ucfirst($column);
                $this->$methodSet($entityManager->getReference($class, $this->$methodGet()));
            }
        }
    }

    /**
     * @return int
     */
    public function getIdCurso()
    {
        return $this->idCurso;
    }

    /**
     * @param int $idCurso
     */
    public function setIdCurso($idCurso)
    {
        $this->idCurso = $idCurso;
    }

    /**
     * @return mixed
     */
    public function getNmCurso()
    {
        return $this->nmCurso;
    }

    /**
     * @param mixed $nmCurso
     */
    public function setNmCurso($nmCurso)
    {
        $this->nmCurso = $nmCurso;
    }

    /**
     * @return int
     */
    public function getNuCargaHorario()
    {
        return $this->nuCargaHorario;
    }

    /**
     * @param int $nuCargaHorario
     */
    public function setNuCargaHorario($nuCargaHorario)
    {
        $this->nuCargaHorario = $nuCargaHorario;
    }

    /**
     * @return string
     */
    public function getSgCurso()
    {
        return $this->sgCurso;
    }

    /**
     * @param string $sgCurso
     */
    public function setSgCurso($sgCurso)
    {
        $this->sgCurso = $sgCurso;
    }


}