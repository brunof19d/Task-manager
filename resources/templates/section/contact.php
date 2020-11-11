<!-- CONTACT -->

<section id="contact" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row">
            <div class="col-md-offset-1 col-md-10 col-sm-12">
                <form id="contact-form" role="form" action="/save-contact" method="POST">

                    <div class="section-title"><h1>Say hello to us</h1></div>

                    <?php require_once __DIR__ . '/../../includes/alert-message.php'; ?>

                    <div class="col-md-4 col-sm-4">
                        <input type="text" class="form-control" placeholder="Full name" name="name" required>
                    </div>

                    <div class="col-md-4 col-sm-4">
                        <input type="email" class="form-control" placeholder="Email address" name="email" required="">
                    </div>

                    <div class="col-md-4 col-sm-4"><input type="submit" class="form-control" value="Send message"></div>

                    <div class="col-md-12 col-sm-12">
                            <textarea class="form-control" rows="8" placeholder="Your message" name="text" required=""></textarea>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>
