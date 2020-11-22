<?php

/**
 * @author Bruno Dadario <brunof19d@gmail.com>
 */

namespace App\Controller\Portfolio;

use App\Entity\CategoryPortfolio;
use App\Entity\Portfolio;
use App\Helper\FlashMessage;
use App\Helper\HelperFunctions;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Nyholm\Psr7\Response;
use Nyholm\Psr7\UploadedFile;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class AddPortfolioController implements RequestHandlerInterface
{
    use FlashMessage;

    private EntityManagerInterface $entityManager;
    private HelperFunctions $helper;
    private Portfolio $portfolio;

    public function __construct(EntityManagerInterface $entityManager, HelperFunctions $helper, Portfolio $portfolio)
    {
        $this->entityManager = $entityManager;
        $this->helper = $helper;
        $this->portfolio = $portfolio;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        try {
            $dateTime = new DateTime();
            $data = $request->getParsedBody(); // Data Form Received

            $category = filter_var($data['category'], FILTER_VALIDATE_INT);
            if ($category === FALSE) throw new Exception('Category ID Invalid');

            $categoryRepository = $this->entityManager
                ->find(CategoryPortfolio::class, $category);

            // Verify Image
            $file = $request->getUploadedFiles()['photo'];
            /** @var UploadedFile $file */
            $nameFile = $file->getClientFilename();
            $typeFile = $file->getClientMediaType();
            $newNameFile = $this->helper->verifyImage($nameFile, $typeFile);

            $this->portfolio
                ->setTitle($data['title'])
                ->setDescription($data['description'])
                ->setDate($dateTime)
                ->setActive($data['active'])
                ->setPhoto($newNameFile)
                ->setCategory($categoryRepository);

            $this->entityManager->persist($this->portfolio);
            $this->entityManager->flush();

            // Move image for path folder.
            $file->moveTo(__DIR__ . '/../../../public/files_uploaded/portfolio/' . $newNameFile);

            $this->alertMessage('success', 'Portfolio added with success');
            return new Response(302, ['Location' => '/admin/portfolio']);
        } catch (Exception $error) {
            $this->alertMessage('danger', $error->getMessage());
            return new Response(302, ['Location' => '/admin/portfolio-add']);
        }
    }
}