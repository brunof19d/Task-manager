<?php


namespace App\View\Admin\Contact;


use App\Helper\RenderHtml;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class Contact implements RequestHandlerInterface
{
    use RenderHtml;
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $html = $this->render('/admin/contact/index.php', [
            'title' => 'Admin | Contact'
        ]);
        return new Response(200, [], $html);
    }
}