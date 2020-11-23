<?php

/**
 * @author Bruno Dadario <brunof19d@gmail.com>
 */

namespace App\View;

use App\Entity\Portfolio;
use App\Entity\Service;
use App\Entity\Testimonial;
use App\Helper\RenderHtml;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class Home implements RequestHandlerInterface
{
    use RenderHtml;

    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $testimonials = $this->entityManager
            ->getRepository(Testimonial::class)
            ->findAll();

        $services = $this->entityManager
            ->getRepository(Service::class)
            ->findAll();

        $dqlPortfolio = "SELECT portfolio FROM App\Entity\Portfolio portfolio";
        $query = $this->entityManager->createQuery($dqlPortfolio);

        $paginator = new Paginator($query);
        $totalItemsQuery = count($paginator);
        $itemsPerPage = 3; //
        $totalPages = ceil($totalItemsQuery / $itemsPerPage);

        $page = 1;
        if (isset($request->getQueryParams()['page'])) {
            $page = $request->getQueryParams()['page'];
        }

        $paginator->getQuery()
            ->setFirstResult($itemsPerPage * ($page-1))
            ->setMaxResults($itemsPerPage);

        $html = $this->render('index.php', [
            'title' => 'Landing Page',
            'testimonials' => $testimonials,
            'services' => $services,
            'portfolios' => $paginator,
            'pagesCount' => $totalPages
        ]);
        return new Response(200, [], $html);
    }
}