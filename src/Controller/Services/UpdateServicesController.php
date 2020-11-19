<?php

/**
 * @author Bruno Dadario <brunof19d@gmail.com>
 */

namespace App\Controller\Services;

use App\Entity\Service;
use App\Helper\FlashMessage;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class UpdateServicesController implements RequestHandlerInterface
{
    use FlashMessage;

    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $redirect = new Response(302, ['Location' => '/admin/services']);
        try {
            $data = $request->getParsedBody();

            $id = filter_var($data['id'], FILTER_VALIDATE_INT);
            if ($id === FALSE) throw new \Exception('ID Service invalid');

            $service = $this->entityManager->getReference(Service::class, $id);

            /** @var Service $service */
            $service->setName($data['service'])
                ->setText($data['text'])
                ->setActive($data['active']);

            $this->entityManager->flush();
            $this->alertMessage('success', 'Service edited with success');

            return $redirect;
        } catch (Exception $error) {
            $this->alertMessage('danger', $error->getMessage());
            return $redirect;
        }
    }
}