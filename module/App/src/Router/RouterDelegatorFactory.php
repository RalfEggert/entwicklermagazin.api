<?php

namespace App\Router;

use App\Action\HomePageAction;
use App\Action\PingAction;
use Interop\Container\ContainerInterface;
use Zend\Expressive\Application;
use Zend\ServiceManager\Factory\DelegatorFactoryInterface;

/**
 * Class RouterDelegatorFactory
 *
 * @package App\Router
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
    public function __invoke(ContainerInterface $container, $name, callable $callback, array $options = null)
    {
        /** @var Application $app */
        $app = $callback();

        $app->get('/', HomePageAction::class, 'home');
        $app->get('/api/ping', PingAction::class, 'api.ping');

        return $app;
    }
}
