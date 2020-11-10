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

class UpdateUser implements RequestHandlerInterface
{
    use FlashMessage;

    private ObjectRepository $repository;
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $repository, EntityManagerInterface $entityManager)
    {
        $this->repository = $repository->getRepository(Admin::class);
        $this->entityManager = $entityManager;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $data = $request->getParsedBody();
        $id = $data['id'];
        try {
            $user = $this->repository->find($id);

            $user->setEmail($data['email']);
            $user->setActive($data['active']);

            $this->entityManager->flush();

            $this->alertMessage('success', 'User update with success');
            return new Response(200, ['Location' => '/admin/users']);
        } catch (Exception $error) {
            $this->alertMessage('danger', $error->getMessage());
            return new Response(302, ["Location" => "/admin/user-edit?id=$id"]);
        }
    }
}