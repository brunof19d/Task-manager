<?php require_once __DIR__ . '/../../../includes/header-admin.php'; ?>

    <div class="jumbotron container p-5 mb-5">
        <h1 class="h2">Team</h1>
        <a href="/admin/team-add" class="btn btn-success">New Employee</a>
        <hr>
        <p class="lead mb-0">Check below all employee registered in your company.</p>
    </div>

    <div class="container">

        <?php require_once __DIR__ . '/../../../includes/alert-message.php'; ?>

        <table class="table table-striped">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Photo</th>
                <th scope="col">Full Name</th>
                <th scope="col">Job Position</th>
                <th scope="col">Description Employee</th>
                <th scope="col">Active</th>
                <th scope="col" colspan="2"></th>
              </tr>
            </thead>
            <tbody>
                    <tr>
                        <th scope="row"></th>
                        <td><img src="" width="100" class="img-responsive"></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <a href="/admin/team-edit" class="btn btn-primary" title="Edit">
                                <i class="far fa-edit"></i>
                            </a>
                        </td>
                        <td>
                            <a href="" class="btn btn-danger" title="Delete">
                                <i class="far fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
            </tbody>
          </table>
    </div>

<?php require_once __DIR__ . '/../../../includes/footer-admin.php'; ?>