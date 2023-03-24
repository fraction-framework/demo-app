<?php

namespace App\EventSubscriber;

use App\Attribute\AccessTokenRequired;
use Fraction\Component\Event\Attribute\EventListener;
use Fraction\Component\Event\Enum\EventType;
use Fraction\Component\Event\EventSubscriberInterface;
use Fraction\Component\Event\EventTypes\ControllerEvent;
use Fraction\Http\Request;
use Fraction\Throwable\UnauthorizedException;

class AccessTokenSubscriber implements EventSubscriberInterface {

  /**
   * @throws UnauthorizedException|\ReflectionException
   */
  #[EventListener(EventType::Controller)]
  public function onController(ControllerEvent $event, Request $request): void {
    $route = $event->getRoute();

    if ($route->getAttribute(AccessTokenRequired::class)) {
      if (!$request->headers->has('Authorization')) {
        // Implement your logic here

        throw new UnauthorizedException(['message' => 'Access token is required']);
      }
    }
  }
}