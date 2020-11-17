<?php

require_once __DIR__ . '/../../../includes/header-admin.php';

/**
 * @var \App\View\Admin\Newsletter\TableNewsletter $newsletters
 * @var \App\Entity\Newsletter $newsletter
 */

?>

    <div class="jumbotron container p-5 mb-5">
        <h1 class="h2">Newsletter</h1>
        <hr>
        <p class="lead mb-0">Check below the list of registered emails to receive the newsletter.</p>
    </div>

    <div class="container">

        <?php require_once __DIR__ . '/../../../includes/alert-message.php'; ?>

        <table class="table table-striped">

            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Email</th>
                <th scope="col">Date</th>
                <th scope="col"></th>
            </tr>
            </thead>

            <tbody>
            <?php foreach ($newsletters as $newsletter): ?>
                <tr>
                    <th scope="row"><?= $newsletter->getId(); ?></th>
                    <td><?= $newsletter->getEmail(); ?></td>
                    <td><?= $newsletter->getDate()->format('d/m/Y');?></td>
                    <td>
                        <a href="/delete-newsletter?id=<?= $newsletter->getId(); ?>" class="btn btn-danger" title="Delete">
                            <i class="far fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>

        </table>
    </div>

<?php require_once __DIR__ . '/../../../includes/footer-admin.php';