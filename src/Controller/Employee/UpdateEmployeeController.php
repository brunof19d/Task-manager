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

class UpdateEmployeeController implements RequestHandlerInterface
{
    use FlashMessage;

    private EntityManagerInterface $entityManager;
    private HelperFunctions $helper;

    public function __construct(EntityManagerInterface $entityManager, HelperFunctions $helper)
    {
        $this->entityManager = $entityManager;
        $this->helper = $helper;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $data = $request->getParsedBody();
        $id = filter_var($data['id'], FILTER_VALIDATE_INT);

        if ($id === FALSE) {
            $this->alertMessage('danger', 'ID Invalid');
            return new Response(302, ['Location' => '/admin/team']);
        }

        try {
            $file = $request->getUploadedFiles()['photo'];
            /** @var UploadedFile $file */
            $nameFile = $file->getClientFilename();

            if (empty($nameFile) === FALSE) {
                $typeFile = $file->getClientMediaType();
                $nameFile = $this->helper->verifyImage($nameFile, $typeFile);
                $file->moveTo(__DIR__ . '/../../../public/files_uploaded/team/' . $nameFile);
            } else {
                $nameFile = $data['photo'];
            }

            $employee = $this->entityManager
                ->getRepository(Employee::class)
                ->find($id);

            /** @var Employee $employee */
            $employee->setName($data['name'])
                ->setPhoto($nameFile)
                ->setActive($data['active'])
                ->setDescription($data['text'])
                ->setJobPosition($data['occupation']);

            $this->entityManager->persist($employee);
            $this->entityManager->flush();

            $this->alertMessage('success', 'Data employee edited with success');
            return new Response(200, ['Location' => '/admin/team']);
        } catch (Exception $error) {
            $this->alertMessage('danger', $error->getMessage());
            return new Response(302, ['Location' => "/admin/team-edit?id={$id}"]);
        }
    }
}