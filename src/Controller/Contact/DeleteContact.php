<?php

/**
 * @author Bruno Dadario <brunof19d@gmail.com>
 */

namespace App\Controller\Contact;


use App\Entity\Contact;
use App\Helper\FlashMessage;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectRepository;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class DeleteContact implements RequestHandlerInterface
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
            if (is_null($id) === TRUE || $id === FALSE) throw new \Exception('ID contact invalid');

            $contact = $this->entityManager->getReference(Contact::class, $id);

            $this->entityManager->remove($contact);
            $this->entityManager->flush();

            $this->alertMessage('success', 'Contact removed with success');
            return new Response(200, ['Location' => '/admin/contact']);
        } catch (\Exception $error) {
            $this->alertMessage('danger', $error->getMessage());
            return new Response(302, ['Location' => '/admin/contact']);
        }
    }
}