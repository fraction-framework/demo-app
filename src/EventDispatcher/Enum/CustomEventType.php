<?php

namespace App\EventDispatcher\Enum;

enum CustomEventType: string {
  case SEND_EMAIL = 'sendEmail';
}