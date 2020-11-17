<?php

/**
 * @author Bruno Dadario <brunof19d@gmail.com>
 */

namespace App\Controller\Testimonial;

use App\Entity\Testimonial;
use App\Helper\FlashMessage;
use App\Helper\HelperFunctions;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Nyholm\Psr7\UploadedFile;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class UpdateTestimonial implements RequestHandlerInterface
{
    use FlashMessage;

    private EntityManagerInterface $entityManager;
    private Testimonial $testimonial;
    private HelperFunctions $helper;

    public function __construct(EntityManagerInterface $entityManager, Testimonial $testimonial, HelperFunctions $helper)
    {
        $this->entityManager = $entityManager;
        $this->testimonial = $testimonial;
        $this->helper = $helper;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $data = $request->getParsedBody();
        $id = $data['id'];
        try {
            /** @var UploadedFile $file */
            $file = $request->getUploadedFiles()['photo'];
            $name = $file->getClientFilename();

            if (empty($name) === FALSE) {
                $name = $file->getClientFilename();
                $type = $file->getClientMediaType();

                $fileName = $this->helper->verifyImage($name, $type);
                $file->moveTo(__DIR__ . '/../../../public/files_uploaded/testimonial/' . $fileName);
            } else {
                $fileName = $data['photo'];
            }

            $repository = $this->entityManager->getRepository(Testimonial::class);
            $testimonial = $repository->find($id);
            $testimonial
                ->setName($data['name'])
                ->setText($data['text'])
                ->setActive($data['active'])
                ->setPhoto($fileName);

            $this->entityManager->flush();

            $this->alertMessage('success', 'Testimonial updated with success');
            return new Response(200, ['Location' => '/admin/testimonial']);
        } catch (\Exception $error) {
            $this->alertMessage('danger', $error->getMessage());
            return new Response(302, ['Location' => "/admin/testimonial-edit?id=$id"]);
        }
    }
}