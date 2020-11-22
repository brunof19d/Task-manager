<?php

require_once __DIR__ . '/../../../includes/header-admin.php';

/**
 * @var \App\View\Admin\Portfolio\TableCategory $categories
 * @var \App\Entity\CategoryPortfolio $category
 */

?>

    <div class="jumbotron container p-5 mb-5">
        <h1 class="h2">Categories</h1>
        <a href="/admin/portfolio/add-category" class="btn btn-success">New Category</a>
        <a href="/admin/portfolio" class="btn btn-primary">Manage Projects</a>
        <hr>
        <p class="lead mb-0">Check below all categories registered for display on the website.</p>
    </div>

    <div class="container">

        <?php include_once __DIR__ . '/../../../includes/alert-message.php'; ?>

        <table class="table table-striped">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Category</th>
                <th scope="col" colspan="2"></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($categories as $category): ?>
                <tr>
                    <th scope="row"><?= $category->getId(); ?></th>
                    <td><?= $category->getName(); ?></td>
                    <td>
                        <a href="/delete-category?id=<?= $category->getId(); ?>" class="btn btn-danger" title="Delete">
                            <i class="far fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

<?php require_once __DIR__ . '/../../../includes/footer-admin.php'; ?>