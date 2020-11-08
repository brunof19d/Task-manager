<?php


namespace App\View\Admin\Testimonial;


use App\Helper\RenderHtml;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class TableTestimonial implements RequestHandlerInterface
{
    use RenderHtml;

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $html = $this->render('admin/testimonial/index.php', [
            'title' => 'Admin | Testimonial'
        ]);
        return new Response(200, [], $html);
    }
}