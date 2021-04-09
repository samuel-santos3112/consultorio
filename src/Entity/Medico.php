<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 *
 * @ORM\Table(name="medico", schema="consultorio")
 * @ORM\Entity(repositoryClass="App\Repository\MedicoRepository")
 *
 */
class Medico implements \JsonSerializable
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="crm", type="string", length=30)
     *
     */
    private $crm;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=150)
     *
     */
    private $nome;

    /**
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Especialidade")
     * @ORM\JoinColumn(nullable=false)
     *
     */
    private $especialidade;

    /**
     * @return mixed
     */
    public function getEspecialidade()
    {
        return $this->especialidade;
    }

    /**
     * @param mixed $especialidade
     */
    public function setEspecialidade($especialidade): void
    {
        $this->especialidade = $especialidade;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getCrm(): string
    {
        return $this->crm;
    }

    /**
     * @param string $crm
     */
    public function setCrm(string $crm): void
    {
        $this->crm = $crm;
    }

    /**
     * @return string
     */
    public function getNome(): string
    {
        return $this->nome;
    }

    /**
     * @param string $nome
     */
    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'id'    => $this->getId(),
            'nome'  => $this->getNome(),
            'crm'   => $this->getCrm()
        ];
    }
}