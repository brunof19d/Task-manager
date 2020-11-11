<?php


namespace App\View\Admin\Contact;


use App\Entity\Contact;
use App\Helper\RenderHtml;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectRepository;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class TableContact implements RequestHandlerInterface
{
    use RenderHtml;

    private ObjectRepository $repository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->repository = $entityManager->getRepository(Contact::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $html = $this->render('/admin/contact/index.php', [
            'title' => 'Admin | Contact',
            'contacts' => $this->repository->findAll()
        ]);
        return new Response(200, [], $html);
    }
}