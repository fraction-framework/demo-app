<?php

namespace App\Binders;

use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Exception;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Exception\MissingMappingDriverImplementation;
use Doctrine\ORM\ORMSetup;
use Fraction\Component\Config\EnvironmentParameterBag;
use Fraction\Component\Locator;
use Fraction\DependencyInjection\Binder;

class DoctrineBinder extends Binder {

  /**
   * @throws MissingMappingDriverImplementation
   * @throws Exception
   */
  public function configure(EnvironmentParameterBag $environmentParameterBag, Locator $locator): object {

    $dbParams = [
      'driver' => $environmentParameterBag->get('DB_DRIVER'),
      'user' => $environmentParameterBag->get('DB_USER'),
      'password' => $environmentParameterBag->get('DB_PASSWORD'),
      'dbname' => $environmentParameterBag->get('DB_NAME'),
    ];

    $config = ORMSetup::createAttributeMetadataConfiguration([$locator->getSourceDir() . '/Entities'], false);
    $connection = DriverManager::getConnection($dbParams, $config);
    return new EntityManager($connection, $config);
  }

  public function getClassName(): string {
    return EntityManager::class;
  }
}