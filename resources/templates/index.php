<?php

require_once __DIR__ . '/../includes/header.php';

require_once __DIR__ . '/section/newsletter.php';

require_once __DIR__ . '/section/services.php';

?>

    <!-- ABOUT -->
    <section id="about" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row">

                <div class="col-md-offset-3 col-md-6 col-sm-12">
                    <div class="section-title">
                        <h1>Professional Team for you</h1>
                    </div>
                </div>

                <div class="col-md-4 col-sm-4">
                    <div class="team-thumb">
                        <img src="images/team-image1.jpg" class="img-responsive" alt="Andrew Orange">
                        <div class="team-info team-thumb-up">
                            <h2>Andrew Orange</h2>
                            <small>Art Director</small>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing eiusmod tempor incididunt ut labore
                                et dolore magna.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-4">
                    <div class="team-thumb">
                        <div class="team-info team-thumb-down">
                            <h2>Catherine Soft</h2>
                            <small>Senior Manager</small>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing eiusmod tempor incididunt ut labore
                                et dolore magna.</p>
                        </div>
                        <img src="images/team-image2.jpg" class="img-responsive" alt="Catherine Soft">
                    </div>
                </div>

                <div class="col-md-4 col-sm-4">
                    <div class="team-thumb">
                        <img src="images/team-image3.jpg" class="img-responsive" alt="Jack Wilson">
                        <div class="team-info team-thumb-up">
                            <h2>Jack Wilson</h2>
                            <small>CEO / Founder</small>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing eiusmod tempor incididunt ut labore
                                et dolore magna.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <?php require_once __DIR__ . '/section/testimonial.php'; ?>

    <!-- PORTFOLIO -->
    <section id="portfolio">
        <div class="container">
            <div class="row">
                <article class="card col-md-4">
                    <img src="https://placehold.it/600x400" class="img-responsive">
                    <div class="card-body">
                        <h1 class="h3">Title project #1</h1>
                        <time>Published em: 12/04/1991</time>
                        <em>Category:</em>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis, et cum ab qui tempore animi
                            quod. Illum rerum earum provident possimus corporis commodi, numquam ea eius ullam rem eum
                            reprehenderit.</p>
                        <a href="" class="btn btn-primary">View Project</a>
                    </div>
                </article>
            </div>
            <nav class="nav-paginacao">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="">Anterior</a></li>
                    <li class="page-item"><a class="page-link" href="">1</a></li>
                    <li class="page-item"><a class="page-link" href="">2</a></li>
                    <li class="page-item"><a class="page-link" href="">Próximo</a></li>
                </ul>
            </nav>
        </div>
    </section>


<?php

require_once __DIR__ . '/section/contact.php';

require_once __DIR__ . '/../includes/footer.php';