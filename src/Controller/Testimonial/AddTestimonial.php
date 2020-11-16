<?php

/**
 * @author Bruno Dadario <brunof19d@gmail.com>
 */

namespace App\Controller\Testimonial;

use App\Entity\Testimonial;
use App\Helper\FlashMessage;
use App\Helper\HelperFunctions;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Nyholm\Psr7\Response;
use Nyholm\Psr7\UploadedFile;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class AddTestimonial implements RequestHandlerInterface
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
        try {
            $data = $request->getParsedBody();

            /** @var UploadedFile $file */
            $file = $request->getUploadedFiles()['photo'];
            $name = $file->getClientFilename();
            $type = $file->getClientMediaType();

            $newName = $this->helper->verifyImage($name, $type);
            $file->moveTo(__DIR__ . '/../../../public/files_uploaded/' . $newName);

            $this->testimonial
                ->setName($data['name'])
                ->setPhoto($newName)
                ->setText($data['text'])
                ->setActive($data['active']);

            $this->entityManager->persist($this->testimonial);
            $this->entityManager->flush();

            $this->alertMessage('success', 'Testimonial added with success');
            return new Response(302, ['Location' => '/admin/testimonial-add']);
        } catch (Exception $error) {
            $this->alertMessage('danger', $error->getMessage());
            return new Response(302, ['Location' => '/admin/testimonial-add']);
        }
    }
}