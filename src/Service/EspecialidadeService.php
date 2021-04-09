<?php

namespace App\Service;

use App\Entity\Especialidade;
use App\Repository\EspecialidadeRepository;
use App\Service\Main\AbstractService;
use App\Util\EspecialidadeUtil as Util;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpKernel\Exception\HttpException;

class EspecialidadeService extends AbstractService
{
    /**
     * @var \Doctrine\Persistence\ObjectRepository
     */
    protected $repository;

    /**
     * MedicoService constructor.
     * @param ManagerRegistry $doctrine
     * @throws \Exception
     */
    public function __construct(ManagerRegistry $doctrine)
    {
        parent::__construct($doctrine);
        $this->repository = $doctrine->getRepository(Especialidade::class);
    }

    /**
     * @return EspecialidadeRepository
     */
    public function getRepository()
    {
        return $this->repository;
    }

    /**
     * @param $dados
     * @return Especialidade
     */
    public function criarEspecialidade($dados)
    {
        return $this->getRepository()->criar(Util::parseJsonToObject($dados));
    }

    /**
     * @return Especialidade[]|object[]
     */
    public function buscarTodasEspecialidades()
    {
        $especialidades = [];

        foreach ($this->getRepository()->findAll() as $especialidade) {
            if (!is_null($especialidade)) {
                array_push($especialidades, $especialidade);
            }
        }

        return $especialidades;
    }

    /**
     * @param $especialidadeId
     * @return Especialidade|object|null
     */
    public function buscarPorId($especialidadeId)
    {
        $this->validaId($especialidadeId);
        return $this->getRepository()->find($especialidadeId);

    }

    /**
     * @param $dados
     * @return array|string[]
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function atualizarPorId($dados)
    {
        $this->validaId($dados->id);
        return $this->getRepository()->atualizar($dados->id, Util::parseJsonToObject($dados));
    }

    /**
     * @param $id
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function deletarPorId($id)
    {
       $this->validaId($id);
       return $this->getRepository()->deletar($id);
    }

    /**
     * @param $especialidadeId
     */
    private function validaId($especialidadeId)
    {
        if (is_null($this->getRepository()->find($especialidadeId))) {
            throw new HttpException(404, "Id não encontrado");
        }
    }

}