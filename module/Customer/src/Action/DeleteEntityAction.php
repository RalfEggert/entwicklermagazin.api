<?php

namespace Customer\Action;

use Customer\Entity\Customer;
use Doctrine\ORM\EntityManager;
use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\JsonResponse;

/**
 * Class DeleteEntityAction
 *
 * @package Customer\Action
 */
class DeleteEntityAction implements MiddlewareInterface
{
    /** @var  EntityManager */
    private $entityManager;

    /**
     * DeleteEntityAction constructor.
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

        if ($customer) {
            $this->entityManager->remove($customer);
            $this->entityManager->flush();

            return new JsonResponse([], 204);
        } else {
            return new JsonResponse([], 404);
        }
    }
}
