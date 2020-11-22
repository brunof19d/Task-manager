<?php

require_once __DIR__ . '/../../../includes/header-admin.php';

/**
 * @var \App\View\Admin\Portfolio\AddPortfolio $categories
 * @var \App\Entity\CategoryPortfolio $category
 */

?>

    <div class="jumbotron container p-5 mb-5">
        <h1 class="h2"><span class="text-secondary">Portfolio /</span> New Project</h1>
        <a href="/admin/portfolio" class="btn btn-success">Back</a>
        <hr>
        <p class="lead mb-0">Use the form below to register a new project in the website portfolio.</p>
    </div>
    <div class="container">

        <?php include_once __DIR__ . '/../../../includes/alert-message.php'; ?>

        <form method="POST" class="card" action="/save-portfolio" enctype="multipart/form-data">
            <div class="card-body">
                <div class="row">

                    <!-- Title -->
                    <div class="form-group col-md-12">
                        <label for="titleForm">* Title Project:</label>
                        <input type="text" id="titleForm" class="form-control" name="title"
                               placeholder="Insert the project title here ..."/>
                    </div>

                    <!-- Categories -->
                    <div class="form-group col-md-6">
                        <label for="categoryForm">* Category project:</label>
                        <select id="categoryForm" name="category" class="form-control custom-select">
                            <option disabled selected value="">-- Select Category --</option>
                            <?php foreach ($categories as $category) : ?>
                                <option value="<?= $category->getId() ?>">
                                    <?= $category->getName() ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- File -->
                    <div class="form-group col-md-6">
                        <label>Photo:</label>
                        <input type="file" class="form-control-file" name="photo"/>
                    </div>

                    <!-- Text -->
                    <div class="form-group col-md-12">
                        <label for="textForm">* Text Project:</label>
                        <textarea id="textForm" name="description" placeholder="Insert the project text here ..."
                                  class="form-control" cols="30" rows="10"></textarea>
                    </div>

                    <!-- Active Button -->
                    <div class="form-group col-md-12">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="active" id="checkbox" value="1"
                                   checked>
                            <label class="custom-control-label" for="checkbox">Make project active ?</label>
                        </div>
                    </div>

                    <div class="form-group col-md-12">
                        <button class="btn btn-lg btn-success">Create Project</button>
                    </div>

                </div>
            </div>
        </form>
    </div>

<?php require_once __DIR__ . '/../../../includes/footer-admin.php'; ?>