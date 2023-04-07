<?php

namespace App\Command;

use Fraction\Console\Attribute\Command;
use Fraction\Console\Attribute\Flag;
use Fraction\Console\ConsoleInterface;

#[Command(name: 'test', description: 'Test command')]
class TestCommand {

  #[Command(name: 'hello', description: 'Say hello')]
  #[Flag(name: 'n', description: 'Your name', hasValue: true)]
  public function hello(ConsoleInterface $console): void {

    if ($console->getFlag('n')) {
      $console->writeln('Hello ' . $console->getFlag('n'));
    } else {
      $console->writeln('Hello World');
    }
  }
}