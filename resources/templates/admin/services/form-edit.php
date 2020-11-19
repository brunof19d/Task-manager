<?php

require_once __DIR__ . '/../../../includes/header-admin.php';

/**
 * @var \App\Entity\Service $service
 */

?>
    <div class="jumbotron container p-5 mb-5">
        <h1 class="h2"><span class="text-secondary">Services /</span> Edit Service</h1>
        <a href="/admin/services" class="btn btn-success">Back</a>
        <hr>
        <p class="lead mb-0">Use the form below to make changes to the selected service.</p>
    </div>

    <div class="container">

        <?php require_once __DIR__ . '/../../../includes/alert-message.php'; ?>

        <form method="POST" class="card" action="/update-services">
            <div class="card-body">
                <div class="row">

                    <div class="form-group col-md-12">
                        <label>* Name service:</label>
                        <input type="text" class="form-control" name="service" value="<?= $service->getName(); ?>"
                               placeholder="Enter the service name here ..."/>
                    </div>

                    <div class="form-group col-md-12">
                        <label>* Text service:</label>
                        <textarea name="text" class="form-control" placeholder="Insert the service text here ..."
                                  cols="30" rows="10"><?= $service->getText(); ?></textarea>
                    </div>

                    <div class="form-group col-md-12">
                        <div class="custom-control custom-checkbox">
                            <input type="hidden" name="active" value="0">
                            <input type="checkbox" class="custom-control-input" name="active" id="checkboxActive"
                                   value="1" <?= ($service->getActive() === 1) ? 'checked' : '';?> />
                            <label class="custom-control-label" for="checkboxActive">Leave service active</label>
                        </div>
                    </div>

                    <div class="form-group col-md-12">
                        <button type="submit" class="btn btn-lg btn-success">Refresh Service</button>
                        <input type="hidden" name="id" value="<?= $service->getId(); ?>">
                    </div>
                </div>
            </div>
        </form>
    </div>

<?php require_once __DIR__ . '/../../../includes/footer-admin.php';