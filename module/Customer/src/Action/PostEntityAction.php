<?php

namespace Customer\Action;

use Customer\Entity\Customer;
use Doctrine\ORM\EntityManager;
use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\JsonResponse;

/**
 * Class PostEntityAction
 *
 * @package Customer\Action
 */
class PostEntityAction implements MiddlewareInterface
{
    /** @var  EntityManager */
    private $entityManager;

    /**
     * PostEntityAction constructor.
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
        $postData = $request->getParsedBody();

        $customer = new Customer(
            null,
            $postData['first_name'],
            $postData['last_name'],
            $postData['country']
        );

        $this->entityManager->persist($customer);
        $this->entityManager->flush();

        return new JsonResponse(
            [
                'entity' => $customer,
            ],
            201
        );
    }
}
