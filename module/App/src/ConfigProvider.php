<?php

namespace App;

use App\Action\HomePageAction;
use App\Action\PingAction;
use Zend\ServiceManager\Factory\InvokableFactory;

/**
 * Class ConfigProvider
 *
 * @package App
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
            'factories'  => [
                PingAction::class => InvokableFactory::class,
                HomePageAction::class => InvokableFactory::class,
            ],
        ];
    }
}
