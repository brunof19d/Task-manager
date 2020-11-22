<?php require_once __DIR__ . '/../../../includes/header-admin.php'; ?>

    <div class="jumbotron container p-5 mb-5">
        <h1 class="h2"><span class="text-secondary">Categories /</span> New Category</h1>
        <a href="/admin/portfolio/category" class="btn btn-success">Back</a>
        <hr>
        <p class="lead mb-0">Use the form below to register a new category in the website portfolio.</p>
    </div>

    <div class="container">

        <?php include_once __DIR__ . '/../../../includes/alert-message.php'; ?>

        <form method="POST" class="card" action="/save-category">
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-12">
                        <label>* Name category:</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter your category name..." />
                    </div>

                    <div class="form-group col-md-12">
                        <button class="btn btn-lg btn-success">Create Category</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

<?php require_once __DIR__ . '/../../../includes/footer-admin.php'; ?>