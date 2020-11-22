<?php

/**
 * @author Bruno Dadario <brunof19d@gmail.com>
 */

namespace App\Controller\Portfolio;

use App\Entity\CategoryPortfolio;
use App\Helper\FlashMessage;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class DeleteCategory implements RequestHandlerInterface
{
    use FlashMessage;

    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $redirect = new Response(200, ['Location' => '/admin/portfolio/category']);

        try {
            $id = filter_var($request->getQueryParams()['id'], FILTER_VALIDATE_INT);
            if ($id === FALSE) throw new Exception('ID Category invalid');

            $category = $this->entityManager->getReference(CategoryPortfolio::class, $id);

            $this->entityManager->remove($category);
            $this->entityManager->flush();

            $this->alertMessage('success', 'Category removed with success');

            return $redirect;
        } catch (Exception $error) {
            $this->alertMessage('danger', $error->getMessage());
            return $redirect;
        }
    }
}