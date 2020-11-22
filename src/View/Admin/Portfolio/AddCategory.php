<?php
/**
 * @author Bruno Dadario <brunof19d@gmail.com>
 */

namespace App\View\Admin\Portfolio;


use App\Helper\RenderHtml;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class AddCategory implements RequestHandlerInterface
{
    use RenderHtml;

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $html = $this->render('/admin/portfolio/add-category.php', [
            'title' => 'Admin | Add Category'
        ]);

        return new Response(200, [], $html);
    }
}