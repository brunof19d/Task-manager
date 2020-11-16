<?php

/**
 * @author Bruno Dadario <brunof19d@gmail.com>
 */

namespace App\View\Admin\Testimonial;

use App\Entity\Testimonial;
use App\Helper\HelperFunctions;
use App\Helper\RenderHtml;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectRepository;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class TableTestimonial implements RequestHandlerInterface
{
    use RenderHtml;

    private ObjectRepository $entityManager;
    private HelperFunctions $helper;

    public function __construct(EntityManagerInterface $entityManager, HelperFunctions $helper)
    {
        $this->entityManager = $entityManager->getRepository(Testimonial::class);
        $this->helper = $helper;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $html = $this->render('admin/testimonial/index.php', [
            'title' => 'Admin | Testimonial',
            'testimonials' => $this->entityManager->findAll(),
            'helper' => $this->helper
        ]);
        return new Response(200, [], $html);
    }
}