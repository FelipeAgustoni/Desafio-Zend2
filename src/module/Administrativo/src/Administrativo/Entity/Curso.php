<?php

/**
 * Created by PhpStorm.
 * User: felipe.agustoni
 * Date: 19/06/2017
 * Time: 10:36
 */

namespace Administrativo\Entity;



/**
 * Curso
 * @ORM\Entity
 * @ORM\Table(name="DESAFIO-ZF.TB_CURSO")
 * @ORM\Entity(repositoryClass="Administrativo\Entity\Repository\CursoRepository")
 */
class Curso extends AbstractEntity
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