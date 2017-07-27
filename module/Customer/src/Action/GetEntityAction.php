<?php

namespace Customer\Action;

use Customer\Entity\Customer;
use Doctrine\ORM\EntityManager;
use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\JsonResponse;

/**
 * Class GetEntityAction
 *
 * @package Customer\Action
 */
class GetEntityAction implements MiddlewareInterface
{
    /** @var  EntityManager */
    private $entityManager;

    /**
     * GetEntityAction constructor.
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

        $id = $request->getAttribute('id');

        /** @var Customer $customer */
        $customer = $customerRepository->find($id);

        if (!$customer) {
            return new JsonResponse([], 404);
        }

        return new JsonResponse(['entity' => $customer]);
    }
}
