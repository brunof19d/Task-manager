<?php


namespace App\Controller\Testimonial;


use App\Entity\Testimonial;
use App\Helper\FlashMessage;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class DeleteTestimonial implements RequestHandlerInterface
{
    use FlashMessage;

    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $redirect = new Response(302, ['Location' => '/admin/testimonial']);
        try {
            $id = $request->getQueryParams()['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
            if ($id === FALSE && is_null($id)) throw new \Exception('ID Testimonial Invalid');

            $testimonial = $this->entityManager->getReference(Testimonial::class, $id);
            $this->entityManager->remove($testimonial);
            $this->entityManager->flush();

            $this->alertMessage('success', 'Testimonial removed with success');
            return $redirect;
        } catch (\Exception $error) {
            $this->alertMessage('danger', $error->getMessage());
            return $redirect;
        }
    }
}