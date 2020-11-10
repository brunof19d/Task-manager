<?php

require_once __DIR__ . '/../../../includes/header-admin.php';

/**
 * @var \App\Entity\Admin $user
 */

?>

    <div class="jumbotron container p-5 mb-5">
        <h1 class="h2"><span class="text-secondary">Users /</span> Edit User</h1>
        <a href="/admin/users" class="btn btn-success">Back</a>
        <hr>
        <p class="lead mb-0">Use the form below to change a site user.</p>
    </div>

    <div class="container">
        <form method="POST" class="card" action="/update-user">
            <div class="card-body">
                <?php require_once __DIR__ . '/../../../includes/alert-message.php'; ?>
                <div class="form-group">
                    <label for="inputEmail">* Email:</label>
                    <input type="text" id="inputEmail" class="form-control" name="email"
                           value="<?= $user->getEmail(); ?>"/>
                </div>
                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input type="hidden" name="active" value="0">
                        <input type="checkbox" class="custom-control-input" name="active" id="checkboxActive"
                               value="1" <?= ($user->getActive() === 1) ? 'checked' : '';?>>
                        <label class="custom-control-label" for="checkboxActive">Leave user active</label>
                    </div>
                </div>
                <input type="hidden" name="id" value="<?= $user->getId(); ?>">
                <div class="form-group">
                    <button class="btn btn-lg btn-success">Refresh User</button>
                </div>
            </div>
        </form>
    </div>

<?php require_once __DIR__ . '/../../../includes/footer-admin.php';