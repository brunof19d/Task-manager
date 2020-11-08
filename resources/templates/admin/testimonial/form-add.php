<?php require_once __DIR__ . '/../../../includes/header-admin.php'; ?>

<div class="jumbotron container p-5 mb-5">
    <h1 class="h2"><span class="text-secondary">Testimonial /</span> New Testimonial</h1>
    <a href="/admin/testimonial" class="btn btn-info btn-sm">Back</a>
    <hr>
    <p class="lead mb-0">Use the form below to register a new testimonial on the website.</p>
</div>
<div class="container">

    <form method="POST" class="card" action="" enctype="multipart/form-data">
        <div class="card-body">
            <div class="row">
                <div class="form-group col-md-6">
                    <label>* Name Person:</label>
                    <input type="text" class="form-control" name="name"
                           placeholder="Enter the person's name here ..."/>
                </div>
                <div class="form-group col-md-6">
                    <label>Foto:</label>
                    <input type="file" class="form-control-file" name="photo"/>
                </div>
                <div class="form-group col-md-12">
                    <label>* Text testimonial:</label>
                    <textarea name="text" class="form-control" cols="30" rows="10"
                              placeholder="Insert the testimonial text here ..."></textarea>
                </div>
                <div class="form-group col-md-12">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="active" id="checkboxAtivo" value="1"
                               checked>
                        <label class="custom-control-label" for="checkboxAtivo">Leave testimonial active</label>
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <button type="submit" class="btn btn-sm btn-success">Register Testimonial</button>
                </div>
            </div>
        </div>
    </form>
</div>
