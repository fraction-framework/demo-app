<?php

namespace App\Controller;

use Fraction\Component\Controller;
use Fraction\DependencyInjection\ContainerInterface;
use Fraction\Http\Attribute\Parameter;
use Fraction\Http\Attribute\Route;
use Fraction\Http\Attribute\View;
use Fraction\Http\ParameterType;
use Fraction\Http\Request;
use Fraction\Http\RequestMethod;
use Fraction\Http\ResponseType;

class HomeController extends Controller {
  #[Route(RequestMethod::GET, '/')]
  public function index(ContainerInterface $container, Request $request): string {
    return 'Hello World';
  }

  #[Route(RequestMethod::GET, '/posts')]
  public function blogPosts(): string {
    return 'Posts';
  }

  #[Route(RequestMethod::GET, '/post/{id}', params: ['id' => '\d+'])]
  public function blogPost(int $id): string {
    return 'Post ' . $id;
  }

  #[Route(RequestMethod::GET, '/name', description: 'Just a simple json response')]
  #[View(response: ResponseType::JSON)]
  public function fullName(Request $request): array {
    return ['name' => 'John', 'lastname' => 'Doe'];
  }

  #[Route(RequestMethod::GET, '/profile')]
  #[Parameter(name: 'name', type: ParameterType::STRING, required: true, description: 'User name')]
  #[Parameter(name: 'age', type: ParameterType::INT, required: false, default: 10, description: 'User age')]
  #[Parameter(name: 'country', required: true, pattern: 'Ukraine', description: 'User country')]
  #[View(response: ResponseType::JSON)]
  public function profile(): array {
    return $this->request->all();
  }
}
