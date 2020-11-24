<?php

/**
 * @author Bruno Dadario <brunof19d@gmail.com>
 */

namespace App\View\Admin\Team;

use App\Entity\Employee;
use App\Helper\HelperFunctions;
use App\Helper\RenderHtml;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class TableTeam implements RequestHandlerInterface
{
    use RenderHtml;

    private EntityManagerInterface $entityManager;
    /**
     * @var HelperFunctions
     */
    private HelperFunctions $helper;

    public function __construct(EntityManagerInterface $entityManager, HelperFunctions $helper)
    {
        $this->entityManager = $entityManager;
        $this->helper = $helper;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $employees = $this->entityManager
            ->getRepository(Employee::class)
            ->findAll();

        $html = $this->render('admin/team/index.php', [
            'title' => 'Admin | Employee',
            'employees' => $employees,
            'helper' => $this->helper
        ]);

        return new Response(200, [], $html);
    }
}