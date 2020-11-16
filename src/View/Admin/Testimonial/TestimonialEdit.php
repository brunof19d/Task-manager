<?php

/**
 * @author Bruno Dadario <brunof19d@gmail.com>
 */

namespace App\View\Admin\Testimonial;

use App\Entity\Testimonial;
use App\Helper\FlashMessage;
use App\Helper\RenderHtml;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectRepository;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class TestimonialEdit implements RequestHandlerInterface
{
    use RenderHtml;
    use FlashMessage;

    private ObjectRepository $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager->getRepository(Testimonial::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $id = $request->getQueryParams()['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);
        if ($id === FALSE) {
            $this->alertMessage('danger', 'ID Testimonial invalid');
            return new Response('/table-testimonial');
        }

        $html = $this->render('admin/testimonial/form-edit.php', [
            'title' => 'Admin | Edit Testimonial',
            'testimonial' => $this->entityManager->findOneBy(['id' => $id])
        ]);
        return new Response(200, [], $html);
    }
}