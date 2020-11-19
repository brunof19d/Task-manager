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

class AddServicesController implements RequestHandlerInterface
{
    use FlashMessage;

    private EntityManagerInterface $entityManager;
    private Service $service;

    public function __construct(EntityManagerInterface $entityManager, Service $service)
    {
        $this->entityManager = $entityManager;
        $this->service = $service;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        try {
            $data = $request->getParsedBody();

            if (isset($data['active']) === FALSE ) {
                $data['active'] = 0;
            }

            $this->service
                ->setName($data['service'])
                ->setText($data['text'])
                ->setActive($data['active']);

            $this->entityManager->persist($this->service);
            $this->entityManager->flush();

            $this->alertMessage('success', 'Services added with success');

            return new Response(200, ['Location' => '/admin/services']);
        } catch (Exception $error) {
            $this->alertMessage('danger', $error->getMessage());
            return new Response(302, ['Location' => '/admin/services-add']);
        }
    }
}