<?php

namespace App;

use App\Action\HomePageAction;
use App\Action\PingAction;
use App\Pipeline\PipelineDelegatorFactory;
use App\Router\RouterDelegatorFactory;
use Zend\Expressive\Application;
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
            'delegators' => [
                Application::class => [
                    PipelineDelegatorFactory::class,
                    RouterDelegatorFactory::class,
                ],
            ],
            'factories'  => [
                PingAction::class => InvokableFactory::class,
                HomePageAction::class => InvokableFactory::class,
            ],
        ];
    }
}
