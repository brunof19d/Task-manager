<?php

/**
 * @author Bruno Dadario <brunof19d@gmail.com>
 */

namespace App\Controller\Employee;

use App\Entity\Employee;
use App\Helper\FlashMessage;
use App\Helper\HelperFunctions;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Nyholm\Psr7\Response;
use Nyholm\Psr7\UploadedFile;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class AddEmployeeController implements RequestHandlerInterface
{
    use FlashMessage;

    private EntityManagerInterface $entityManager;
    private Employee $employee;
    private HelperFunctions $helper;

    public function __construct(EntityManagerInterface $entityManager, Employee $employee, HelperFunctions $helper)
    {
        $this->entityManager = $entityManager;
        $this->employee = $employee;
        $this->helper = $helper;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $redirect = new Response(302, ['Location' => '/admin/team-add']);

        try {
            $data = $request->getParsedBody();

            $this->employee->setName($data['name'])
                ->setJobPosition($data['occupation'])
                ->setDescription($data['text'])
                ->setActive($data['active']);

            $file = $request->getUploadedFiles()['photo'];
            /** @var UploadedFile $file */
            $namePhoto = $file->getClientFilename();
            if (empty($namePhoto) === FALSE) {
                $typePhoto = $file->getClientMediaType();

                $namePhoto = $this->helper->verifyImage($namePhoto, $typePhoto);
                $file->moveTo(__DIR__ . '/../../../public/files_uploaded/team/' . $namePhoto);
            }

            $this->employee->setPhoto($namePhoto);

            $this->entityManager->persist($this->employee);
            $this->entityManager->flush();

            $this->alertMessage('success', 'Employee added with success');
            return $redirect;
        } catch (Exception $error) {
            $this->alertMessage('danger', $error->getMessage());
            return $redirect;
        }
    }
}