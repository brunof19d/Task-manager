<?php

namespace App\View\Admin\Newsletter;

use App\Entity\Newsletter;
use App\Helper\RenderHtml;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class TableNewsletter implements RequestHandlerInterface
{
    use RenderHtml;

    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $findAll = $this->entityManager
            ->getRepository(Newsletter::class)
            ->findAll();

        $html = $this->render('admin/newsletter/index.php', [
            'title' => 'Admin | Newsletter',
            'newsletters' => $findAll
        ]);
        return new Response(200, [], $html);
    }
}