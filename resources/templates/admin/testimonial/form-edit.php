<?php

require_once __DIR__ . '/../../../includes/header-admin.php';

/** @var \App\Entity\Testimonial $testimonial */

?>

<div class="jumbotron container p-5 mb-5">
    <h1 class="h2"><span class="text-secondary">Testimonial /</span> Edit Testimonial</h1>
    <a href="/admin/testimonial" class="btn btn-info btn-sm">Back</a>
    <div class="clearfix"></div>
    <hr>
    <p class="lead mb-0">Use the form below to make changes to the selected statement.</p>
</div>

<div class="container">
    <form method="POST" class="card" action="/update-testimonial" enctype="multipart/form-data">
        <div class="card-body">

            <?php require_once __DIR__ . '/../../../includes/alert-message.php'; ?>

            <div class="row">

                <div class="form-group col-md-6">
                    <label>* Name Person:</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter the person's name here ..."
                    value="<?= $testimonial->getName(); ?>"/>
                </div>

                <div class="form-group col-md-6">
                    <label>Foto:</label>
                    <input type="file" class="form-control-file" name="photo"/>
                    <input type="hidden" name="photo" value="<?= $testimonial->getPhoto(); ?>">
                </div>

                <div class="form-group col-md-12">
                    <label>* Text testimonial:</label>
                    <textarea name="text" class="form-control" cols="30" rows="10" placeholder="Insert the testimonial text here ..."><?= nl2br($testimonial->getText()); ?></textarea>
                </div>

                <div class="form-group col-md-12">
                    <div class="custom-control custom-checkbox">
                        <input type="hidden" name="active" value="0">
                        <input type="checkbox" class="custom-control-input" name="active" id="checkboxAtivo" value="1"
                               checked <?= ($testimonial->getActive() === 1) ? 'checked' : '';?>>
                        <label class="custom-control-label" for="checkboxAtivo">Leave testimonial active</label>
                    </div>
                </div>

                <input type="hidden" name="id" value="<?= $testimonial->getId(); ?>">

                <div class="form-group col-md-12">
                    <button type="submit" class="btn btn-sm btn-success">Update Testimonial</button>
                </div>

            </div>
        </div>
    </form>
</div>

<?php require_once __DIR__ . '/../../../includes/footer-admin.php'; ?>