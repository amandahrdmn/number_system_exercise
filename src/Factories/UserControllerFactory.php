<?php


namespace App\Factories;


use App\Controllers\UsersController;
use Psr\Container\ContainerInterface;

class UserControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $userModel = $container->get('UserModel');
        return new UsersController($userModel);
    }

}