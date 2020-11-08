<?php require_once __DIR__ . '/../../includes/header-admin.php'; ?>

    <div class="container my-5">
        <form method="POST" action="/make-login" class="card mx-auto w-50">
            <div class="card-header p-5 text-center">
                <h3 class="h2 mb-0">Restricted area</h3>
                <span>Use the form below to access the Administrative Area.</span>
            </div>

            <div class="card-body p-5">
                <div class="form-group">
                    <label for="inputEmail">* User:</label>
                    <input type="email" name="email" id="inputEmail" placeholder="user@email.com" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="inputPassword">* Password:</label>
                    <input type="password" name="password" id="inputPassword" placeholder="*****" class="form-control"/>
                </div>
                <div class="form-group">
                    <button class="btn btn-dark w-100" type="submit">Login</button>
                </div>
            </div>
        </form>
    </div>

<?php require_once __DIR__ . '/../../includes/footer-admin.php'; ?>