<?php require_once __DIR__ . '/../../../includes/header-admin.php'; ?>

    <div class="jumbotron container p-5 mb-5">
        <h1 class="h2">Newsletter</h1>
        <hr>
        <p class="lead mb-0">Check below the list of registered emails to receive the newsletter.</p>
    </div>

    <div class="container">

        <?php require_once __DIR__ . '/../../../includes/alert-message.php'; ?>

        <table class="table table-striped">

            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Email</th>
                <th scope="col">Date</th>
                <th scope="col"></th>
            </tr>
            </thead>

            <tbody>
            <tr>
                <th scope="row">1</th>
                <td>email@email.com</td>
                <td>19/10/1971</td>
                <td><a href="" class="btn btn-danger" title="Delete"><i class="far fa-trash-alt"></i></a></td>
            </tr>
            </tbody>

        </table>
    </div>

<?php require_once __DIR__ . '/../../../includes/footer-admin.php';