<?php

namespace Customer\Action;

use Customer\Entity\Customer;
use Doctrine\ORM\EntityManager;
use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\JsonResponse;

/**
 * Class PutEntityAction
 *
 * @package Customer\Action
 */
class PutEntityAction implements MiddlewareInterface
{
    /** @var  EntityManager */
    private $entityManager;

    /**
     * PutEntityAction constructor.
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

        $putData = (array) json_decode($request->getBody()->getContents());

        /** @var Customer $customer */
        $customer = $customerRepository->find($id);
        $customer->update(
            $putData['first_name'],
            $putData['last_name'],
            $putData['country']
        );

        $this->entityManager->persist($customer);
        $this->entityManager->flush();

        return new JsonResponse(
            [
                'entity' => $customer,
            ]
        );
    }
}
