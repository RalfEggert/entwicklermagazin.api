<?php

namespace Check\Action;

use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\JsonResponse;

/**
 * Class CheckMethodAction
 *
 * @package Check\Action
 */
class CheckMethodAction implements MiddlewareInterface
{
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
        return new JsonResponse(
            [
                'check'  => 'Der Check der HTTP Methode war erfolgreich.',
                'method' => $request->getMethod(),
            ]
        );
    }
}
