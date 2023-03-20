<?php

namespace App\Controller;

use App\Resources\Errors\ProfileError;
use App\Resources\Profile;
use Doctrine\ORM\EntityManager;
use Fraction\Component\Controller;
use Fraction\Http\Attribute\Error;
use Fraction\Http\Attribute\Parameter;
use Fraction\Http\Attribute\Route;
use Fraction\Http\Attribute\View;
use Fraction\Http\Enum\ParameterType;
use Fraction\Http\Enum\RequestMethod;
use Fraction\Http\Enum\ResponseStatus;
use Fraction\Http\Enum\ResponseType;
use Fraction\Http\Request;

class HomeController extends Controller {
  #[Route(RequestMethod::GET, '/article')]
  #[View(template: 'article.twig', response: ResponseType::HTML)]
  public function article(): array {
    return ['title' => 'Hello World', 'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'];
  }

  #[Route(RequestMethod::GET, '/post/{id}', params: ['id' => '\d+'])]
  #[View(response: ResponseType::PLAIN)]
  public function blogPost(int $id, EntityManager $em): string {
    return 'Post ' . $id;
  }

  #[Route(RequestMethod::GET, '/posts')]
  #[View(response: ResponseType::PLAIN)]
  public function blogPosts(): string {
    return 'Posts';
  }

  #[Route(RequestMethod::GET, '/name', description: 'Just a simple json response')]
  #[View(response: ResponseType::JSON)]
  public function fullName(Request $request): array {
    return ['name' => 'John', 'lastname' => 'Doe'];
  }

  #[Route(RequestMethod::GET, '/')]
  #[View(response: ResponseType::PLAIN)]
  public function index(): string {
    return 'Hello World';
  }

  #[Route(RequestMethod::GET, '/profile', description: 'User profile')]
  #[Parameter(name: 'name', type: ParameterType::STRING, required: true, description: 'User name')]
  #[Parameter(name: 'age', type: ParameterType::INT, required: false, default: 10, description: 'User age')]
  #[Parameter(name: 'country', required: true, pattern: 'Ukraine', description: 'User country')]
  #[View(resource: Profile::class, response: ResponseType::JSON)]
  #[Error(responseStatus: ResponseStatus::BadRequest, reference: ProfileError::class)]
  public function profile(): array {
    return $this->request->all();
  }
}
