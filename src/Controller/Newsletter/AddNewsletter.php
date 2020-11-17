<?php


namespace App\Controller\Newsletter;


use App\Entity\Newsletter;
use App\Helper\FlashMessage;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class AddNewsletter implements RequestHandlerInterface
{
    use FlashMessage;

    private EntityManagerInterface $entityManager;
    private Newsletter $newsletter;

    public function __construct(EntityManagerInterface $entityManager, Newsletter $newsletter)
    {
        $this->entityManager = $entityManager;
        $this->newsletter = $newsletter;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $redirect = new Response(302, ['Location' => '/home#home']);
        try {
            $email = filter_var($request->getParsedBody()['email'], FILTER_VALIDATE_EMAIL);
            if ($email === FALSE) throw new \Exception('Email invalid');
            $date = new DateTimeImmutable();
            $this->newsletter
                ->setEmail($email)
                ->setDate($date);

            $this->entityManager->persist($this->newsletter);
            $this->entityManager->flush();

            $this->alertMessage('success', 'Message successfully received, soon our team will contact you');
            return $redirect;
        } catch (\Exception $error) {
            $this->alertMessage('danger', $error->getMessage());
            return $redirect;
        }
    }
}