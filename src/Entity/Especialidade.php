<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 *
 * @ORM\Table(name="especialidade", schema="consultorio")
 * @ORM\Entity(repositoryClass="App\Repository\EspecialidadeRepository")
 *
 */
class Especialidade implements \JsonSerializable
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
     * @ORM\Column(name="descricao", type="string", length=150)
     *
     */
    private $descricao;

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
    public function getDescricao(): string
    {
        return $this->descricao;
    }

    /**
     * @param string $descricao
     */
    public function setDescricao(string $descricao): void
    {
        $this->descricao = $descricao;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'id'    => $this->getId(),
            'descricao'  => $this->getDescricao()
        ];
    }
}