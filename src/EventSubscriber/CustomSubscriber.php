<?php

namespace App\EventSubscriber;

use App\EventDispatcher\Enum\CustomEventType;
use Fraction\Component\Event\Attribute\EventListener;
use Fraction\Component\Event\EventSubscriberInterface;
use Fraction\Component\Event\EventTypes\Event;

class CustomSubscriber implements EventSubscriberInterface {

  #[EventListener('custom.send_email')]
  public function onCustomEvent(Event $event): void {
    // Implement your logic here
    print_r($event->getData());
  }

  #[EventListener(CustomEventType::SEND_EMAIL)]
  public function onCustomEventType(Event $event): void {
    // Implement your logic here
    print_r($event->getData());
  }
}