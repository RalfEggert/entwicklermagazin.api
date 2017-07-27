<?php

namespace Customer\Action;

use Customer\Entity\Customer;
use Doctrine\ORM\EntityManager;
use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\JsonResponse;

/**
 * Class GetCollectionAction
 *
 * @package Customer\Action
 */
class GetCollectionAction implements MiddlewareInterface
{
    /** @var  EntityManager */
    private $entityManager;

    /**
     * GetCollectionAction constructor.
     *
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @param ServerRequestInterface $request
     * @param DelegateInterface      $delegate
     *
     * @return JsonResponse
     */
    public function process(
        ServerRequestInterface $request,
        DelegateInterface $delegate
    ) {
        $customerRepository = $this->entityManager->getRepository(Customer::class);

        return new JsonResponse(
            [
                'collection' => $customerRepository->findAll(),
            ]
        );
    }
}
