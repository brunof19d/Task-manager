<?php

/**
 * @author Bruno Dadario <brunof19d@gmail.com>
 */

namespace App\Controller\Employee;


use App\Entity\Employee;
use App\Helper\FlashMessage;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class DeleteEmployeeController implements RequestHandlerInterface
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
            if ($id === FALSE) {
                throw new Exception('ID Employee invalid');
            }

            $employee = $this->entityManager->getReference(Employee::class, $id);

            $this->entityManager->remove($employee);
            $this->entityManager->flush();

            $this->alertMessage('success', 'Employee removed with success');
            return new Response(200, ['Location' => '/admin/team']);
        } catch (Exception $error) {
            $this->alertMessage('danger', $error->getMessage());
            return new Response(302, ['Location' => '/admin/team']);
        }
    }
}