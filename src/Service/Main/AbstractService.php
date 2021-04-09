<?php

namespace App\Service\Main;


use App\Model\Entity\Usuario;
use Doctrine\Persistence\ManagerRegistry;

abstract class AbstractService
{
    /**
     * @var ManagerRegistry
     */
    protected $manager;



    public function __construct(ManagerRegistry $doctrine)
    {
        if (!$doctrine) {
            throw new \Exception('ManagerRegistry não informado na instância do objeto App\Service\Login.');
        }

        $this->manager = $doctrine;
    }

    /**
     * @return ManagerRegistry
     */
    public function getManager()
    {
        return $this->manager;
    }


}
