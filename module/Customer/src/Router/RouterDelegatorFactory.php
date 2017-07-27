<?php

namespace Customer\Router;

use Customer\Action\DeleteEntityAction;
use Customer\Action\GetCollectionAction;
use Customer\Action\GetEntityAction;
use Customer\Action\PostEntityAction;
use Customer\Action\PutEntityAction;
use Interop\Container\ContainerInterface;
use Zend\Expressive\Application;
use Zend\ServiceManager\Factory\DelegatorFactoryInterface;

/**
 * Class RouterDelegatorFactory
 *
 * @package Customer\Router
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

        $idConstraint = ['constraints' => ['id' => '[0-9]+']];

        $app->get('/customer', GetCollectionAction::class, 'customer-get-collection');
        $app->get('/customer/{id}', GetEntityAction::class, 'customer-get-entity')->setOptions($idConstraint);
        $app->post('/customer', PostEntityAction::class, 'customer-post-entity');
        $app->put('/customer/{id}', PutEntityAction::class, 'customer-put-entity')->setOptions($idConstraint);
        $app->delete('/customer/{id}', DeleteEntityAction::class, 'customer-delete-entity')->setOptions($idConstraint);

        return $app;
    }
}
