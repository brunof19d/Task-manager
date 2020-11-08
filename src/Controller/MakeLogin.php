<?php


namespace App\Controller;


use App\Helper\FlashMessage;
use Exception;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class MakeLogin implements RequestHandlerInterface
{
    use FlashMessage;

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        try {


            $data = $request->getParsedBody();

            $_SESSION['logged'] = true;

            return new Response(200, ['Location' => '/admin']);

        } catch (Exception $error) {
            echo 'Error:' . $this->alertMessage('danger', $error->getMessage());
            return new Response(302, ['Location' => '/login']);
        }
    }
}