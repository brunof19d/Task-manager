<?php


namespace App\Controller\Users;


use App\Entity\Admin;
use App\Helper\FlashMessage;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class PersistUsers implements RequestHandlerInterface
{
    use FlashMessage;

    private EntityManagerInterface $entityManager;
    private Admin $admin;

    public function __construct(EntityManagerInterface $entityManager, Admin $admin)
    {
        $this->entityManager = $entityManager;
        $this->admin = $admin;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        try {
            $data = $request->getParsedBody();

            $this->admin->setEmail($data['email']);

            if ( $data['password'] !== $data['confirmPassword'] ) {
                throw new Exception('Password must be to same');
            } elseif ( strlen($data['password']) < 4 ) {
                throw new Exception('The password must contain more than 4 characters');
            }

            $this->admin->setPassword($data['password']);

            $this->admin->setActive($data['active']);

            $this->entityManager->persist($this->admin);
            $this->entityManager->flush();

            return new Response(200, ['Location' => '/home']);
        } catch (Exception $error) {
            echo 'Error: ' . $this->alertMessage('danger', $error->getMessage());
            return new Response(302, ['Location' => '/admin/users-add']);
        }
    }
}