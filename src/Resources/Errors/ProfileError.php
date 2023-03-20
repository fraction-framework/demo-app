<?php

namespace App\Resources\Errors;

class ProfileErrorFields {
  public string $age;
  public string $country;
  public string $name;
}

class ProfileError {
  public ProfileErrorFields $errors;
  public string $message;
}