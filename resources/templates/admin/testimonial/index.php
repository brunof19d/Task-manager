<?php

require_once __DIR__ . '/../../../includes/header-admin.php';

/**
 * @var \App\View\Admin\Testimonial\TableTestimonial $testimonials
 * @var \App\Entity\Testimonial $testimonial
 * @var \App\Helper\HelperFunctions $helper
 */

?>

    <div class="jumbotron container p-5 mb-5">
        <h1 class="h2">Testimonial</h1>
        <a href="/admin/testimonial-add" class="btn btn-success btn-sm">New Testimonial</a>
        <hr>
        <p class="lead mb-0">Check below all the testimonials registered for display on the website.</p>
    </div>

    <div class="container">
        <?php require_once __DIR__ . '/../../../includes/alert-message.php'; ?>
        <table class="table table-striped">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Photo</th>
                <th scope="col">Name</th>
                <th scope="col" style="width: 40%">Text</th>
                <th scope="col">Active</th>
                <th scope="col" colspan="2"></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($testimonials as $testimonial): ?>
                <tr>
                    <td scope="row"><?= $testimonial->getId(); ?></td>

                    <td>
                        <?php if (is_null($testimonial->getPhoto())): ?>
                            <img src="https://placehold.it/100x100" width="100" class="img-responsive"
                                 alt="photo_person">
                        <?php else: ?>
                            <img src="/files_uploaded/<?= $testimonial->getPhoto() ?>" width="100"
                                 class="img-responsive" alt="photo_person">
                        <?php endif; ?>
                    </td>
                    <td><?= $testimonial->getName(); ?></td>
                    <td><?= $testimonial->getText(); ?></td>
                    <td><?= $helper->translatesUserActive($testimonial->getActive()); ?></td>
                    <td>
                        <a href="/admin/testimonial-edit?id=<?= $testimonial->getId(); ?>" class="btn btn-primary" title="Edit">
                            <i class="far fa-edit"></i>
                        </a>
                    </td>
                    <td>
                        <a href="/delete-testimonial?id=<?= $testimonial->getId(); ?>" class="btn btn-danger" title="Delete">
                            <i class="far fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

<?php require_once __DIR__ . '/../../../includes/footer-admin.php'; ?>