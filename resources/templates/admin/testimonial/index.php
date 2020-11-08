<?php require_once __DIR__ . '/../../../includes/header-admin.php'; ?>

<div class="jumbotron container p-5 mb-5">
    <h1 class="h2">Testimonial</h1>
    <a href="/admin/testimonial-add" class="btn btn-success btn-sm">New Testimonial</a>

    <hr>
    <p class="lead mb-0">Check below all the testimonials registered for display on the website.</p>
</div>
<div class="container">
    <table class="table table-striped">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Photo</th>
            <th scope="col">Name</th>
            <th scope="col">Text</th>
            <th scope="col">Active</th>
            <th scope="col" colspan="2"></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">1</th>
            <td><img src="" width="100" class="img-responsive" alt="photo_person"></td>
            <td>John</td>
            <td>Text here</td>
            <td>Yes | No</td>
            <td><a href="/admin/testimonial-edit" class="btn btn-primary btn-sm" title="Edit"><i class="far fa-edit"></i></a></td>
            <td><a href="" class="btn btn-danger btn-sm" title="Delete"><i class="far fa-trash-alt"></i></a></td>
        </tr>
        </tbody>
    </table>
</div>
