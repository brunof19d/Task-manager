<?php
/**
 * @author Bruno Dadario <brunof19d@gmail.com>
 */

namespace App\Controller\Portfolio;


use App\Entity\CategoryPortfolio;
use App\Entity\Portfolio;
use App\Helper\FlashMessage;
use App\Helper\HelperFunctions;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Nyholm\Psr7\Response;
use Nyholm\Psr7\UploadedFile;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class UpdatePortfolioController implements RequestHandlerInterface
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
        $id = $data['id'];
        try {
            $category = filter_var($data['category'], FILTER_VALIDATE_INT);
            if ($category === FALSE) throw new Exception('Category ID Invalid');

            $categoryRepository = $this->entityManager
                ->find(CategoryPortfolio::class, $category);

            $portfolio = $this->entityManager
                ->getRepository(Portfolio::class)
                ->find($id);

            /** @var UploadedFile $file */
            $file = $request->getUploadedFiles()['photo'];
            $name = $file->getClientFilename();

            if (empty($name) === FALSE) {
                $name = $file->getClientFilename();
                $type = $file->getClientMediaType();

                $fileName = $this->helper->verifyImage($name, $type);
                $file->moveTo(__DIR__ . '/../../../public/files_uploaded/portfolio/' . $fileName);
            } else {
                $fileName = $data['photo'];
            }

            /** @var Portfolio $portfolio */
            $portfolio
                ->setTitle($data['title'])
                ->setDescription($data['description'])
                ->setPhoto($fileName)
                ->setActive($data['active'])
                ->setCategory($categoryRepository)
            ;

            $this->entityManager->flush();

            $this->alertMessage('success', 'Portfolio edited with success');

            return new Response(200, ['Location' => '/admin/portfolio']);
        } catch (Exception $error) {
            $this->alertMessage('danger', $error->getMessage());
            return new Response(302, ['Location' => "/admin/portfolio-edit?id={$id}"]);
        }
    }
}