<?php


namespace App\Controller;


use App\Entity\Admin;
use App\Helper\FlashMessage;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectRepository;
use Exception;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class MakeLogin implements RequestHandlerInterface
{
    use FlashMessage;

    private ObjectRepository $repository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->repository = $entityManager->getRepository(Admin::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        try {
            $data = $request->getParsedBody();

            $email = filter_var($data['email'], FILTER_VALIDATE_EMAIL);
            if (is_null($email) || $email === FALSE) throw new Exception('Form email invalid');

            $password = filter_var($data['password'], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
            if (is_null($password) || $password === FALSE) throw new Exception('Form password invalid');

            /** @var Admin $user */
            $user = $this->repository->findOneBy(['email' => $email]);

            if ($user->getActive() === 0) throw new Exception('User is inactive');

            $hash = password_verify($password, $user->getPassword());

            if (is_null($user) || $hash === FALSE) throw new Exception('Email or password wrong');

            $_SESSION['logged'] = true;
            return new Response(200, ['Location' => '/admin']);
        } catch (Exception $error) {
            echo 'Error:' . $this->alertMessage('danger', $error->getMessage());
            return new Response(302, ['Location' => '/login']);
        }
    }
}