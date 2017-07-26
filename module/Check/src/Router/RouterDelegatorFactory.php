<?php

namespace Check\Router;

use Check\Action\CheckMethodAction;
use Interop\Container\ContainerInterface;
use Zend\Expressive\Application;
use Zend\ServiceManager\Factory\DelegatorFactoryInterface;

/**
 * Class RouterDelegatorFactory
 *
 * @package Check\Router
 */
class RouterDelegatorFactory implements DelegatorFactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string             $name
     * @param callable           $callback
     * @param array|null         $options
     *
     * @return Application
     */
    public function __invoke(
        ContainerInterface $container,
        $name,
        callable $callback,
        array $options = null
    ) {
        /** @var Application $app */
        $app = $callback();

        $app->route(
            '/check/method',
            CheckMethodAction::class,
            ['get', 'post', 'put', 'delete', 'patch'],
            'check.method'
        );

        return $app;
    }
}
