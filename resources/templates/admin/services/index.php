<?php

require_once __DIR__ . '/../../../includes/header-admin.php';

/**
 * @var \App\View\Admin\Services\TableServices $services
 * @var \App\Entity\Service $service
 * @var \App\Helper\HelperFunctions $helper
 */

?>

    <div class="jumbotron container p-5 mb-5">
        <h1 class="h2">Services</h1>
        <a href="/admin/services-add" class="btn btn-success">New service</a>
        <hr>
        <p class="lead mb-0">Check below all the services registered for display on the website.</p>
    </div>
    <div class="container">

        <?php require_once __DIR__ . '/../../../includes/alert-message.php'; ?>

        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col" style="width: 20%;">Name</th>
                <th scope="col">Text</th>
                <th scope="col">Active</th>
                <th scope="col" colspan="2"></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($services as $service): ?>
                <tr>
                    <th scope="row"><?= $service->getId(); ?></th>
                    <td><?= $service->getName(); ?></td>
                    <td><?= $service->getText(); ?></td>
                    <td><?= $helper->translatesUserActive($service->getActive()); ?></td>
                    <td>
                        <a href="/admin/services-edit?id=<?= $service->getId(); ?>" class="btn btn-primary" title="Edit">
                            <i class="far fa-edit"></i>
                        </a>
                    </td>
                    <td>
                        <a href="/delete-services?id=<?= $service->getId(); ?>" class="btn btn-danger" title="Delete">
                            <i class="far fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

<?php require_once __DIR__ . '/../../../includes/footer-admin.php';