<?php

/**
 * @author Bruno Dadario <brunof19d@gmail.com>
 */

namespace App\View\Admin\Users;

use App\Entity\Admin;
use App\Helper\FlashMessage;
use App\Helper\RenderHtml;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectRepository;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class UserEdit implements RequestHandlerInterface
{
    use RenderHtml;
    use FlashMessage;

    private ObjectRepository $repository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->repository = $entityManager->getRepository(Admin::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $id = $request->getQueryParams()['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if (is_null($id) || $id === FALSE) {
            $this->alertMessage('danger', 'ID user invalid');
            return new Response(302, ['Location' => '/admin/users']);
        }

        $html = $this->render('admin/users/form-edit.php', [
            'title' => 'Admin | Edit User',
            'user' => $this->repository->findOneBy(['id' => $id])
        ]);
        return new Response(200, [], $html);
    }
}