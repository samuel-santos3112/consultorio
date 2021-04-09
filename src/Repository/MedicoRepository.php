<?php

namespace App\Repository;

use App\Entity\Medico;
use Doctrine\ORM\EntityManagerInterface;


/**
 * @method Medico|null find($id, $lockMode = null, $lockVersion = null)
 * @method Medico|null findOneBy(array $criteria, array $orderBy = null)
 * @method Medico[]    findAll()
 * @method Medico[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MedicoRepository extends EntityRepository
{

    /**
     * MedicoRepository constructor.
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        parent::__construct($entityManager, Medico::class);
    }

    /**
     * @param Medico $medico
     * @return Medico
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function criar(Medico $medico)
    {
        $this->getEntityManager()->persist($medico);
        $this->getEntityManager()->flush();

        return $medico;
    }

    /**
     * @param $id
     * @param Medico $medico
     * @return array|string[]
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function atualizar($id, Medico $medico)
    {
        $medicoAntigo = $this->find($id);

        $medicoAntigo->setNome($medico->getNome() ?? $medicoAntigo->getNome());
        $medicoAntigo->setCrm($medico->getCrm() ?? $medicoAntigo->setCrm());
        $this->getEntityManager()->flush();

        return $medicoAntigo;
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