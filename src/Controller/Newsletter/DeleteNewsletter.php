<?php

namespace App\Controller\Newsletter;

use App\Entity\Newsletter;
use App\Helper\FlashMessage;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class DeleteNewsletter implements RequestHandlerInterface
{
    use FlashMessage;

    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        try {
            $id = filter_var($request->getQueryParams()['id'], FILTER_VALIDATE_INT);
            if ($id === FALSE) throw new \Exception('ID newsletter invalid');

            $newsletter = $this->entityManager->getReference(Newsletter::class, $id);
            $this->entityManager->remove($newsletter);
            $this->entityManager->flush();

            $this->alertMessage('success', 'Newsletter removed with success');
            return new Response(200, ['Location' => '/admin/newsletter']);
        } catch (\Exception $error) {
            $this->alertMessage('danger', $error->getMessage());
            return new Response(302, ['Location' => '/admin/newsletter']);
        }
    }
}