<?php require_once __DIR__ . '/../../../includes/header-admin.php'; ?>

<div class="jumbotron container p-5 mb-5">
    <h1 class="h2"><span class="text-secondary">User /</span> New User</h1>
    <a href="admin/users" class="btn btn-info">Back</a>
    <hr>
    <p class="lead mb-0">Use the form below to register a new user on the site.</p>
</div>

<div class="container">

    <?php require_once __DIR__ . '/../../../includes/alert-message.php'; ?>

    <form method="POST" class="card" action="/save-user">
        <div class="card-body">
            <div class="row">

                <div class="form-group col-md-12">
                    <label for="inputEmail">* Email:</label>
                    <input type="text" class="form-control" name="email" id="inputEmail" placeholder="Enter you login email here..."/>
                </div>

                <div class="form-group col-md-12">
                    <label for="inputPassword">* Password:</label>
                    <input type="password" class="form-control" name="password" id="inputPassword" placeholder="Enter you password here..."/>
                </div>

                <div class="form-group col-md-12">
                    <label for="inputConfirm">* Confirm Password:</label>
                    <input type="password" class="form-control" name="confirmPassword" id="inputConfirm" placeholder="Confirm you password here..."/>
                </div>

                <div class="form-group col-md-12">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="active" id="checkboxActive" value="1" checked>
                        <label class="custom-control-label" for="checkboxActive">Leave user active</label>
                    </div>
                </div>

                <div class="form-group col-md-12">
                    <button class="btn btn-success" type="submit">Register user</button>
                </div>

            </div>
        </div>
    </form>

</div>

<?php require_once __DIR__ . '/../../../includes/footer-admin.php';