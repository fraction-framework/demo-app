<?php

namespace App\Controller;

use Fraction\Component\Controller;
use Fraction\Http\Attribute\Route;
use Fraction\Http\RequestMethod;

class HomeController extends Controller {
  #[Route(RequestMethod::GET, '/')]
  public function index(): string {
    return 'Hello World';
  }

  #[Route(RequestMethod::GET, '/test')]
  public function test(): string {
    return 'Test';
  }
}
