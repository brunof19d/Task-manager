<?php

/**
 * @author Bruno Dadario <brunof19d@gmail.com>
 */

namespace App\View\Admin\Services;

use App\Entity\Service;
use App\Helper\HelperFunctions;
use App\Helper\RenderHtml;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class TableServices implements RequestHandlerInterface
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
        $services = $this->entityManager->getRepository(Service::class);

        $html = $this->render('admin/services/index.php', [
            'title' => 'Admin | Services',
            'services' => $services->findAll(),
            'helper' => $this->helper
        ]);

        return new Response(200, [], $html);
    }
}