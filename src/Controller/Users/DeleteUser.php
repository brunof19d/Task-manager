<?php


namespace App\Controller\Users;


use App\Entity\Admin;
use App\Helper\FlashMessage;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectRepository;
use Exception;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class DeleteUser implements RequestHandlerInterface
{
    use FlashMessage;

    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $redirect = new Response(302, ['Location' => '/admin/users']);
        try {
            $id = filter_var($request->getQueryParams()['id'], FILTER_VALIDATE_INT);

            if (is_null($id) || $id === FALSE) throw new Exception('ID user invalid');

            $user = $this->entityManager->getReference(Admin::class, $id);
            $this->entityManager->remove($user);
            $this->entityManager->flush();

            $this->alertMessage('success', 'User removed with success');
            return $redirect;
        } catch (Exception $error) {
            $this->alertMessage('danger', $error->getMessage());
            return $redirect;
        }
    }
}