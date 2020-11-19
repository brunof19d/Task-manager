<?php require_once __DIR__ . '/../../../includes/header-admin.php'; ?>

    <div class="jumbotron container p-5 mb-5">
        <h1 class="h2"><span class="text-secondary">Services /</span> New Service</h1>
        <a href="/admin/services" class="btn btn-success">Back</a>
        <hr>
        <p class="lead mb-0">Use the form below to register a new service on the site.</p>
    </div>

    <div class="container">

        <?php require_once __DIR__ . '/../../../includes/alert-message.php'; ?>

        <form method="POST" class="card" action="/save-services">
            <div class="card-body">
                <div class="row">

                    <div class="form-group col-md-12">
                        <label>* Name service:</label>
                        <input type="text" class="form-control" name="service"
                               placeholder="Enter the service name here ..."/>
                    </div>

                    <div class="form-group col-md-12">
                        <label>* Text service:</label>
                        <textarea name="text" class="form-control" cols="30" rows="10"
                                  placeholder="Insert the service text here ..."></textarea>
                    </div>

                    <div class="form-group col-md-12">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="active" id="checkboxActive"
                                   value="1">
                            <label class="custom-control-label" for="checkboxActive">Leave service active</label>
                        </div>
                    </div>

                    <div class="form-group col-md-12">
                        <button type="submit" class="btn btn-lg btn-success">Save Service</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

<?php require_once __DIR__ . '/../../../includes/footer-admin.php';