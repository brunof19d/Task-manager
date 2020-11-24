<?php

require_once __DIR__ . '/../../../includes/header-admin.php';

/**
 * @var \App\Entity\Employee $employee
 */

?>

    <div class="jumbotron container p-5 mb-5">
        <h1 class="h2"><span class="text-secondary">Team /</span> Edit Contributor</h1>
        <a href="" class="btn btn-success">Back</a>
        <hr>
        <p class="lead mb-0">Use the form below to change a collaborator's information.</p>
    </div>

    <div class="container">

        <?php require_once __DIR__ . '/../../../includes/alert-message.php'; ?>

        <form method="POST" class="card" action="/update-employee" enctype="multipart/form-data">
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>* Name</label>
                        <input type="text" class="form-control" name="name" value="<?= $employee->getName(); ?>"
                               placeholder="Enter the full name of the contributor here..."/>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Photo:</label>
                        <input type="file" class="form-control-file" name="photo"/>
                        <input type="hidden" name="photo" value="<?= $employee->getPhoto(); ?>">

                    </div>
                    <div class="form-group col-md-6">
                        <label for="job">* Occupation:</label>
                        <input type="text" id="job" class="form-control" value="<?= $employee->getJobPosition(); ?>"
                               name="occupation" placeholder="Insert the employee's position here ..."/>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="custom-control custom-checkbox">
                            <input type="hidden" name="active" value="0">
                            <input type="checkbox" class="custom-control-input" name="active" value="1" id="check"
                                <?= ($employee->getActive() === 1) ? 'checked' : ''; ?> />
                            <label for="check" class="custom-control-label">Leave active collaborator</label>
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label>* Minicurriculum:</label>
                        <textarea name="text" class="form-control" placeholder="Insert the testimonial text here ..."
                                  cols="30" rows="10"><?= $employee->getDescription(); ?></textarea>
                    </div>

                    <div class="form-group col-md-12">
                        <button type="submit" class="btn btn-lg btn-success">Refresh Employee</button>
                        <input type="hidden" name="id" value="<?= $employee->getId(); ?>">
                    </div>
                </div>
            </div>
        </form>
    </div>

<?php require_once __DIR__ . '/../../../includes/footer-admin.php';