<?php

/**
 * @author Bruno Dadario <brunof19d@gmail.com>
 */

namespace App\View\Admin\Services;

use App\Entity\Service;
use App\Helper\FlashMessage;
use App\Helper\RenderHtml;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class UpdateServices implements RequestHandlerInterface
{
    use RenderHtml;
    use FlashMessage;

    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $id = filter_var($request->getQueryParams()['id'], FILTER_VALIDATE_INT);

        if ($id === FALSE) {
            $this->alertMessage('danger', 'ID Service invalid');
            return new Response(302, ['Location' => '/admin/services']);
        }

        $service = $this->entityManager->getReference(Service::class, $id);

        $html = $this->render('admin/services/form-edit.php', [
            'title' => 'Admin | Update Service',
            'service' => $service
        ]);

        return new Response(200, [], $html);
    }
}