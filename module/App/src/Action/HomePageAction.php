<?php

namespace App\Action;

use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface as ServerMiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\JsonResponse;

/**
 * Class HomePageAction
 *
 * @package App\Action
 */
class HomePageAction implements ServerMiddlewareInterface
{
    /**
     * @param ServerRequestInterface $request
     * @param DelegateInterface      $delegate
     *
     * @return JsonResponse
     */
    public function process(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        return new JsonResponse(
            [
                'welcome'    => 'Herzlichen Glückwunsch! Die Installation hat geklappt.',
                'projectUrl' => 'https://github.com/RalfEggert/entwicklermagazin.api',
            ]
        );
    }
}
