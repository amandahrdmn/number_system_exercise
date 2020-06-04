<?php


namespace App\Controllers;


use App\Abstracts\Controller;
use App\Interfaces\UserModelInterface;
use App\Utilities\ConvertNumberSystem;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class UsersController extends Controller
{
    private $userModel;

    /**
     * UserController constructor.
     * @param $userModel
     */
    public function __construct(UserModelInterface $userModel)
    {
        $this->userModel = $userModel;
    }

    public function __invoke(Request $request, Response $response, array $args)
    {
        $userIdArray = $this->userModel->getAllUserIds();

        $converted_array = ConvertNumberSystem::convertToBase63($userIdArray);

        print("<pre>".print_r($converted_array,true)."</pre></br>");

        foreach ($converted_array as $user) {
            $this->userModel->convertIdNumbers($user);
        }
        return $response;
    }
}