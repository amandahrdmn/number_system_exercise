<?php

namespace App\Factories;

use App\Models\UsersModel;
use Psr\Container\ContainerInterface;

class UsersModelFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $db = $container->get('DBUtility')::getConnection();
        $db->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);

        return new UsersModel($db);
    }
}