<?php require_once __DIR__ . '/../../../includes/header-admin.php'; ?>

<div class="jumbotron container p-5 mb-5">
    <h1 class="h2"><span class="text-secondary">Users /</span> Edit User</h1>
    <a href="/admin/users" class="btn btn-success">Back</a>
    <hr>
    <p class="lead mb-0">Use the form below to change a site user.</p>
</div>

<div class="container">

    <form method="POST" class="card" action="">
        <div class="card-body">
            <div class="row">

                <div class="form-group col-md-12">
                    <label for="inputEmail">* Email:</label>
                    <input type="text" id="inputEmail" class="form-control" name="email" value=""/>
                </div>

                <div class="form-group col-md-12">
                    <label for="inputPassword">* Password:</label>
                    <input type="password" id="inputPassword" class="form-control" name="password" value=""/>
                </div>

                <div class="form-group col-md-12">
                    <label for="inputConfirm">* Confirm Password:</label>
                    <input type="password" id="inputConfirm" class="form-control" name="confirmPassword" value=""/>
                </div>

                <div class="form-group col-md-12">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="active" id="checkboxAtivo" value="1">
                        <label class="custom-control-label" for="checkboxAtivo">Leave user active</label>
                    </div>
                </div>

                <div class="form-group col-md-12">
                    <button class="btn btn-lg btn-success">Refresh User</button>
                    <input type="hidden" name="id" value="">
                </div>
            </div>
        </div>
    </form>
</div>

<?php require_once __DIR__ . '/../../../includes/footer-admin.php';