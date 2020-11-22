<?php

/**
 * @author Bruno Dadario <brunof19d@gmail.com>
 */

namespace App\View\Admin\Portfolio;

use App\Entity\Portfolio;
use App\Helper\HelperFunctions;
use App\Helper\RenderHtml;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class TablePortfolio implements RequestHandlerInterface
{
    use RenderHtml;

    private EntityManagerInterface $entityManager;
    private HelperFunctions $helper;

    public function __construct(EntityManagerInterface $entityManager, HelperFunctions $helper)
    {
        $this->entityManager = $entityManager;
        $this->helper = $helper;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $portfolios = $this->entityManager->getRepository(Portfolio::class);

        $html = $this->render('/admin/portfolio/index.php', [
            'title' => 'Admin | Portfolio',
            'portfolios' => $portfolios->findAll(),
            'helper' => $this->helper
        ]);

        return new Response(200, [], $html);
    }
}