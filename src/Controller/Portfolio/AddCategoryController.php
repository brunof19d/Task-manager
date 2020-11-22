<?php

/**
 * @author Bruno Dadario <brunof19d@gmail.com>
 */

namespace App\Controller\Portfolio;

use App\Entity\CategoryPortfolio;
use App\Helper\FlashMessage;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class AddCategoryController implements RequestHandlerInterface
{
    use FlashMessage;

    private EntityManagerInterface $entity;
    private CategoryPortfolio $category;

    public function __construct(EntityManagerInterface $entity, CategoryPortfolio $category)
    {
        $this->entity = $entity;
        $this->category = $category;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $redirect = new Response(302, ['Location' => '/admin/portfolio/add-category']);
        try {

            $this->category->setName($request->getParsedBody()['name']);

            $this->entity->persist($this->category);
            $this->entity->flush();

            $this->alertMessage('success', 'Category added with success');

            return $redirect;
        } catch (\Exception $error) {
            $this->alertMessage('danger', $error->getMessage());
            return $redirect;
        }
    }
}