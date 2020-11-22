<?php

/**
 * @author Bruno Dadario <brunof19d@gmail.com>
 */

namespace App\Controller\Portfolio;

use App\Entity\Portfolio;
use App\Helper\FlashMessage;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class DeletePortfolio implements RequestHandlerInterface
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
            if ($id === FALSE) throw new Exception('ID Portfolio invaluid');

            $repository = $this->entityManager
                ->getRepository(Portfolio::class);
            $portfolio = $repository->find($id);

            $this->entityManager->remove($portfolio);
            $this->entityManager->flush();

            $this->alertMessage('success', 'Portfolio removed with success');
            return new Response(200, ['Location' => '/admin/portfolio']);
        } catch (Exception $error) {
            $this->alertMessage('danger', $error->getMessage());
            return new Response(302, ['Location' => '/admin/portfolio']);
        }
    }
}