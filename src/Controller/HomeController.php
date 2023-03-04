<?php

namespace App\Controller;

use Fraction\Component\Controller;
use Fraction\DependencyInjection\ContainerInterface;
use Fraction\Http\Attribute\Route;
use Fraction\Http\Request;
use Fraction\Http\RequestMethod;
use Fraction\Http\ResponseType;

class HomeController extends Controller {
  #[Route(RequestMethod::GET, '/')]
  public function index(ContainerInterface $container, Request $request): string {
    return 'Hello World';
  }

  #[Route(RequestMethod::GET, '/test')]
  public function test(): string {
    return 'Test';
  }

  #[Route(RequestMethod::GET, '/test/{id}', params: ['id' => '\d+'])]
  public function testSingle(int $id, Request $request): string {
    return 'Test ' . $id;
  }

  #[Route(RequestMethod::GET, '/json', description: 'Test JSON', view: ResponseType::JSON)]
  public function testJson(Request $request): array {
    return ['test' => 'json', 'test2' => 'json2'];
  }
}
