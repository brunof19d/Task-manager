<?php

/**
 * @author Bruno Dadario <brunof19d@gmail.com>
 */

namespace App\Controller\Contact;

use App\Entity\Contact;
use App\Helper\FlashMessage;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class AddContact implements RequestHandlerInterface
{
    use FlashMessage;

    private EntityManagerInterface $entityManager;
    private Contact $contact;

    public function __construct(EntityManagerInterface $entityManager, Contact $contact)
    {
        $this->entityManager = $entityManager;
        $this->contact = $contact;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        try {
            $data = $request->getParsedBody();
            $date = new \DateTimeImmutable();
            $this->contact
                ->setName($data['name'])
                ->setEmail($data['email'])
                ->setText($data['text'])
                ->setDate($date);

            $this->entityManager->persist($this->contact);
            $this->entityManager->flush();

            $this->alertMessage('success', 'Message send with success');
            return new Response(200, ['Location' => '/home#contact-form']);
        } catch (Exception $error) {
            $this->alertMessage('danger', $error->getMessage());
            return new Response(302, ['Location' => '/home#contact-form']);
        }
    }
}