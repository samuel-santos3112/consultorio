<?php

namespace App\Service;

use App\Entity\Especialidade;
use App\Entity\Medico;
use App\Repository\MedicoRepository;
use App\Service\Main\AbstractService;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpKernel\Exception\HttpException;

class MedicoService extends AbstractService
{
    /**
     * @var MedicoRepository
     */
    protected $repository;

    /**
     * @var EspecialidadeService
     */
    protected $especialidadeService;

    /**
     * MedicoService constructor.
     * @param ManagerRegistry $doctrine
     * @throws \Exception
     */
    public function __construct(ManagerRegistry $doctrine, EspecialidadeService $especialidadeService)
    {
        parent::__construct($doctrine);
        $this->repository               = $doctrine->getRepository(Medico::class);
        $this->especialidadeService    = $especialidadeService;
    }

    /**
     * @return MedicoRepository
     */
    public function getRepository()
    {
        return $this->repository;
    }

    /**
     * @param $dados
     * @return Especialidade
     */
    public function criarMedico($dados)
    {
        $especialidade = $this->especialidadeService->buscarPorId($dados->especialidadeId);

        $medico = new Medico();
        $medico->setNome($dados->nome);
        $medico->setCrm($dados->crm);
        $medico->setEspecialidade($especialidade);

        return $this->getRepository()->criar($medico);
    }

    /**
     * @return Medico[]|object[]
     */
    public function buscarTodosMedicos()
    {
        $medicos = [];

        foreach ($this->getRepository()->findAll() as $medico) {
            if (!is_null($medico)) {
                array_push($medicos, $medico);
            }
        }

        return $medicos;
    }

    /**
     * @param $medicoId
     * @return Medico|object|null
     */
    public function buscarPorId($medicoId)
    {
        $this->validaId($medicoId);
        return $this->getRepository()->find($medicoId);

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
        return $this->getRepository()->atualizar($dados->id, til::parseJsonToObject($dados));
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
     * @param $medicoId
     */
    private function validaId($medicoId)
    {
        if (is_null($this->getRepository()->find($medicoId))) {
            throw new HttpException(404, "Id não encontrado");
        }
    }

}