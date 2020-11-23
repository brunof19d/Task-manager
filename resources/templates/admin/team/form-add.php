<?php require_once __DIR__ . '/../../../includes/header-admin.php'; ?>

    <div class="jumbotron container p-5 mb-5">
        <h1 class="h2"><span class="text-secondary">Team /</span> New Contributor</h1>
        <a href="/admin/team" class="btn btn-info">Back</a>
        <hr>
        <p class="lead mb-0">Use the form below to register a new employee on your company's team.</p>
    </div>

    <div class="container">

        <?php require_once __DIR__ . '/../../../includes/alert-message.php'; ?>

        <form method="POST" class="card" action="" enctype="multipart/form-data">
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>* Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter the full name of the contributor here..." />
                    </div>
                    <div class="form-group col-md-6">
                        <label>Photo:</label>
                        <input type="file" class="form-control-file" name="photo" />
                    </div>
                    <div class="form-group col-md-6">
                        <label>* Occupation:</label>
                        <input type="text" class="form-control" name="occupation" placeholder="Insert the employee's position here ..." />
                    </div>
                    <div class="form-group col-md-6">
                        <label>&nbsp;</label>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="active" id="checkboxActive" checked>
                            <label class="custom-control-label" for="checkboxActive">Leave active collaborator</label>
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label>* Minicurriculum:</label>
                        <textarea name="text" class="form-control" cols="30" rows="10" placeholder="Insert the testimonial text here ..."></textarea>
                    </div>
                    
                    <div class="form-group col-md-12">
                        <button type="submit" class="btn btn-lg btn-success">Register Employee</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

<?php require_once __DIR__ . '/../../../includes/footer-admin.php';