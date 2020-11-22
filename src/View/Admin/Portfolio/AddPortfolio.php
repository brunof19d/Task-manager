<?php

/**
 * @author Bruno Dadario <brunof19d@gmail.com>
 */

namespace App\View\Admin\Portfolio;

use App\Entity\CategoryPortfolio;
use App\Helper\RenderHtml;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class AddPortfolio implements RequestHandlerInterface
{
    use RenderHtml;

    use RenderHtml;

    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $categories = $this->entityManager
            ->getRepository(CategoryPortfolio::class)
            ->findAll();

        $html = $this->render('admin/portfolio/form-add.php', [
            'title' => 'Admin | Portfolio Category',
            'categories' => $categories
        ]);

        return new Response(200, [], $html);
    }
}