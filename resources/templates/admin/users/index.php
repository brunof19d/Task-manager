<?php

require_once __DIR__ . '/../../../includes/header-admin.php';

/**
 * @var \App\View\Admin\Users\TableUsers $users
 * @var \App\Entity\Admin $user
 * @var \App\Helper\HelperFunctions $helper
 *
 */

?>

    <div class="jumbotron container p-5 mb-5">
        <h1 class="h2">Users</h1>
        <a href="/admin/user-add" class="btn btn-success">New User</a>
        <hr>
        <p class="lead mb-0">Check out all the admin users registered on the site below.</p>
    </div>

    <div class="container">
        <?php require_once __DIR__ . '/../../../includes/alert-message.php'; ?>
        <table class="table table-striped">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Email User</th>
                <th scope="col">Active</th>
                <th scope="col" colspan="2"></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <th scope="row"><?= $user->getId(); ?></th>
                    <td><?= $user->getEmail(); ?></td>
                    <td><?= $helper->translatesUserActive($user->getActive()); ?></td>
                    <td>
                        <a href="/admin/user-edit?id=<?= $user->getId(); ?>" class="btn btn-primary" title="Edit">
                            <i class="far fa-edit"></i>
                        </a>
                    </td>
                    <td>
                        <a href="/delete-user?id=<?= $user->getId(); ?>" class="btn btn-danger" title="Delete">
                            <i class="far fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

<?php require_once __DIR__ . '/../../../includes/footer-admin.php'; ?>