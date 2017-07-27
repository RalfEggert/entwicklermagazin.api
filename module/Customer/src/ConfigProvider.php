<?php

namespace Customer;

use Customer\Action\AbstractActionFactory;
use Customer\Action\GetCollectionAction;
use Customer\Action\GetEntityAction;
use Customer\Action\PostEntityAction;
use Customer\Action\PutEntityAction;
use Customer\Router\RouterDelegatorFactory;
use Zend\Expressive\Application;

/**
 * Class ConfigProvider
 *
 * @package Customer
 */
class ConfigProvider
{
    /**
     * @return array
     */
    public function __invoke()
    {
        return [
            'dependencies' => $this->getDependencies(),
        ];
    }

    /**
     * @return array
     */
    public function getDependencies()
    {
        return [
            'delegators' => [
                Application::class => [
                    RouterDelegatorFactory::class,
                ],
            ],
            'factories'  => [
                GetCollectionAction::class => AbstractActionFactory::class,
                GetEntityAction::class     => AbstractActionFactory::class,
                PostEntityAction::class    => AbstractActionFactory::class,
                PutEntityAction::class     => AbstractActionFactory::class,
            ],
        ];
    }
}
