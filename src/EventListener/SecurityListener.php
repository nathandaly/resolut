<?php

namespace App\EventListener;

use Symfony\Bundle\FrameworkBundle\Routing\Router;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;

/**
 * Class SecurityListener
 */
class SecurityListener
{
    /**
     * @var Router
     */
    protected $router;

    /**
     * @var AuthorizationCheckerInterface
     */
    protected $authorizationChecker;

    /**
     * @var EventDispatcher
     */
    protected $dispatcher;

    /**
     * SecurityListener constructor.
     * @param Router $router
     * @param AuthorizationCheckerInterface $authorizationChecker
     * @param EventDispatcherInterface $dispatcher
     */
    public function __construct(Router $router, AuthorizationCheckerInterface $authorizationChecker, EventDispatcherInterface $dispatcher)
    {
        $this->router = $router;
        $this->authorizationChecker = $authorizationChecker;
        $this->dispatcher = $dispatcher;
    }

    /**
     * @param InteractiveLoginEvent $event
     */
    public function onSecurityInteractiveLogin(InteractiveLoginEvent $event)
    {
        $this->dispatcher->addListener(KernelEvents::RESPONSE, [$this, 'onKernelResponse']);
    }

    /**
     * @param FilterResponseEvent $event
     */
    public function onKernelResponse(FilterResponseEvent $event)
    {
        switch (true) {
            case $this->authorizationChecker->isGranted('ROLE_ADMIN'):
                $response = new RedirectResponse($this->router->generate('sonata_admin_dashboard'));
                break;
            case $this->authorizationChecker->isGranted('ROLE_USER'):
                $response = new RedirectResponse($this->router->generate('home_page.index')); // TODO: User profile page
                break;
            default:
                $response = new RedirectResponse($this->router->generate('home_page.index'));
        }

        $event->setResponse($response);
    }
}