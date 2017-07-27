<?php

namespace Customer;

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
            ],
        ];
    }
}
