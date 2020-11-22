<?php

/**
 * @author Bruno Dadario <brunof19d@gmail.com>
 */

namespace App\View\Admin\Portfolio;

use App\Entity\CategoryPortfolio;
use App\Entity\Portfolio;
use App\Helper\FlashMessage;
use App\Helper\RenderHtml;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class UpdatePortfolio implements RequestHandlerInterface
{
    use RenderHtml;
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
            if ($id === FALSE) throw new Exception('ID Portfolio invalid');

            $portfolio = $this->entityManager
                ->getRepository(Portfolio::class)
                ->find($id);

            $categories = $this->entityManager
                ->getRepository(CategoryPortfolio::class)
                ->findAll();

            $html = $this->render('/admin/portfolio/form-edit.php', [
                'title' => 'Admin | Portfolio Edit',
                'portfolio' => $portfolio,
                'categories' => $categories
            ]);

            return new Response(200, [], $html);
        } catch (\Exception $error) {
            $this->alertMessage('danger', $error->getMessage());
            return new Response(302, ['Location' => '/admin/portfolio']);
        }

    }
}