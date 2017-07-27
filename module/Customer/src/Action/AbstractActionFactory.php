<?php

namespace Customer\Action;

use Doctrine\ORM\EntityManager;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class AbstractActionFactory
 *
 * @package Customer\Action
 */
class AbstractActionFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string             $requestedName
     * @param array|null         $options
     *
     * @return GetCollectionAction
     */
    public function __invoke(
        ContainerInterface $container,
        $requestedName,
        array $options = null
    ) {
        /** @var EntityManager $entityManager */
        $entityManager = $container->get('doctrine.entity_manager.orm_default');

        return new $requestedName($entityManager);
    }
}
