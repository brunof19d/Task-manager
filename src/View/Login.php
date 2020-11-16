<?php

/**
 * @author Bruno Dadario <brunof19d@gmail.com>
 */

namespace App\View;

use App\Helper\RenderHtml;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class Login implements RequestHandlerInterface
{
    use RenderHtml;

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $html = $this->render('admin/login.php', ['title' => 'Login']);
        return new Response(200, [], $html);
    }
}