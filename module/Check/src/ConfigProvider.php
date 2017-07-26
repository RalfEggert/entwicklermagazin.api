<?php

namespace Check;

use Check\Action\CheckMethodAction;
use Check\Router\RouterDelegatorFactory;
use Zend\Expressive\Application;
use Zend\ServiceManager\Factory\InvokableFactory;

/**
 * Class ConfigProvider
 *
 * @package Check
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
                CheckMethodAction::class => InvokableFactory::class,
            ],
        ];
    }
}
