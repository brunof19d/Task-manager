<?php

/**
 * @author Bruno Dadario <brunof19d@gmail.com>
 */

namespace App\View\Admin\Users;

use App\Entity\Admin;
use App\Helper\HelperFunctions;
use App\Helper\RenderHtml;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectRepository;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class TableUsers implements RequestHandlerInterface
{
    use RenderHtml;
    private ObjectRepository $repository;
    private HelperFunctions $helper;

    public function __construct(EntityManagerInterface $entityManager, HelperFunctions $helper)
    {
        $this->repository = $entityManager->getRepository(Admin::class);
        $this->helper = $helper;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $html = $this->render('admin/users/index.php', [
            'title' => 'Admin | Users',
            'users' => $this->repository->findAll(),
            'helper' => $this->helper
        ]);
        return new Response(200, [], $html);
    }
}