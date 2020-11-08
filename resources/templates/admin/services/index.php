<?php require_once __DIR__ . '/../../../includes/header-admin.php'; ?>

    <div class="jumbotron container p-5 mb-5">
        <h1 class="h2">Services</h1>
        <a href="" class="btn btn-success">New service</a>
        <hr>
        <p class="lead mb-0">Check below all the services registered for display on the website.</p>
    </div>
    <div class="container">

        <?php require_once __DIR__ . '/../../../includes/alert-message.php'; ?>

        <table class="table table-striped">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Text</th>
                <th scope="col">Active</th>
                <th scope="col" colspan="2"></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Service</td>
                <td>Text service</td>
                <td>Yes | No</td>
                <td><a href="" class="btn btn-primary" title="Edit"><i class="far fa-edit"></i></a></td>
                <td><a href="" class="btn btn-danger" title="Delete"><i class="far fa-trash-alt"></i></a></td>
            </tr>
            </tbody>
        </table>
    </div>

<?php require_once __DIR__ . '/../../../includes/footer-admin.php';