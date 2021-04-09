<?php

namespace App\Repository;

use App\Entity\Especialidade;
use Doctrine\ORM\EntityManagerInterface;


/**
 * @method Especialidade|null find($id, $lockMode = null, $lockVersion = null)
 * @method Especialidade|null findOneBy(array $criteria, array $orderBy = null)
 * @method Especialidade[]    findAll()
 * @method Especialidade[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EspecialidadeRepository extends EntityRepository
{

    /**
     * MedicoRepository constructor.
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        parent::__construct($entityManager, Especialidade::class);
    }

    /**
     * @param Especialidade $especialidade
     * @return Especialidade
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function criar(Especialidade $especialidade)
    {
        $this->getEntityManager()->persist($especialidade);
        $this->getEntityManager()->flush();

        return $especialidade;
    }

    /**
     * @param $id
     * @param Especialidade $especialidade
     * @return array|string[]
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function atualizar($id, Especialidade $especialidade)
    {
        $especialidadeAntiga = $this->find($id);

        $especialidadeAntiga->setDescricao($especialidade->getDescricao() ?? $especialidadeAntiga->getDescricao());
        $this->getEntityManager()->flush();

        return $especialidadeAntiga;
    }

    /**
     * @param $id
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function deletar($id)
    {
        $this->getEntityManager()->remove($this->find($id));
        $this->getEntityManager()->flush();
    }

}