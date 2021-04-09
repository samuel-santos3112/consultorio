<?php


namespace App\Repository;

use App\Model\QueryFilter\AbstractQueryFilter;
use App\Util\CustomPaginator;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\ClassMetadata;
use Doctrine\ORM\EntityRepository as BaseEntityRepository;

class EntityRepository extends BaseEntityRepository
{

    /**
     * Construtor da classe
     *
     * EntityRepository constructor.
     * @param EntityManagerInterface $em
     * @param string $entityName
     */
    public function __construct(EntityManagerInterface $em, string $entityName)
    {
        $classMetadata = new ClassMetadata($entityName);
        parent::__construct($em, $classMetadata);

        # inclui o paginator da classe
    }




}
