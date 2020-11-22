<?php

require_once __DIR__ . '/../../../includes/header-admin.php';

/**
 * @var \App\Entity\Portfolio $portfolio
 * @var \App\Helper\HelperFunctions $helper
 */

?>

    <div class="jumbotron container p-5 mb-5">
        <h1 class="h2">Portfolio</h1>
        <a href="/admin/portfolio-add" class="btn btn-success">New Project</a>
        <a href="/admin/portfolio/category" class="btn btn-primary">Manage Categories</a>
        <hr>
        <p class="lead mb-0">Check out all the projects registered for display on the website below</p>
    </div>

    <div class="container">

        <?php include_once __DIR__ . '/../../../includes/alert-message.php'; ?>

        <table class="table table-striped">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Category</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Date</th>
                <th scope="col">Active</th>
                <th scope="col" colspan="2"></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($portfolios as $portfolio): ?>
                <tr>
                    <th scope="row"><?= $portfolio->getId(); ?></th>
                    <td>
                        <img src="/files_uploaded/portfolio/<?= $portfolio->getPhoto(); ?>" width="100"
                             class="img-responsive"/>
                    </td>
                    <td><?= $portfolio->getCategory()->getName(); ?></td>
                    <td><?= $portfolio->getTitle(); ?></td>
                    <td><?= $portfolio->getDescription(); ?></td>
                    <td><?= $portfolio->getDate()->format('d/m/Y'); ?></td>
                    <td><?= $helper->translatesUserActive($portfolio->getActive()); ?></td>
                    <td>
                        <a href="portfolio-edit?id=<?=$portfolio->getId();?>" class="btn btn-primary" title="Edit">
                            <i class="far fa-edit"></i>
                        </a>
                    </td>
                    <td>
                        <a href="/delete-portfolio?id=<?=$portfolio->getId();?>" class="btn btn-danger" title="Delete">
                            <i class="far fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

<?php require_once __DIR__ . '/../../../includes/footer-admin.php'; ?>