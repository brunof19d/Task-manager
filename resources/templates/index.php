<?php require_once __DIR__ . '/../includes/header.php'; ?>

    <!-- FEATURE -->
    <section id="home" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">

                <div class="col-md-offset-3 col-md-6 col-sm-12">
                    <div class="home-info">
                        <h3>professional landing page</h3>
                        <h1>We help you manage your website successfully!</h1>
                        <form action="" method="get" class="online-form">
                            <input type="email" name="email" class="form-control" placeholder="Enter your email"
                                   required="">
                            <button type="submit" class="form-control">Get started</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- FEATURE -->
    <section id="feature" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row">

                <div class="col-md-12 col-sm-12">
                    <div class="section-title">
                        <h1>What you get</h1>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="active"><a href="#tab01" aria-controls="tab01" role="tab" data-toggle="tab">Responsive</a>
                        </li>

                        <li><a href="#tab02" aria-controls="tab02" role="tab" data-toggle="tab">Mobile</a></li>

                        <li><a href="#tab03" aria-controls="tab03" role="tab" data-toggle="tab">Support</a></li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane active" id="tab01" role="tabpanel">
                            <div class="tab-pane-item">
                                <h2>Minimal Design</h2>
                                <p>Nam feugiat a ante sollicitudin luctus. Quisque eget placerat massa. Ut quis ligula
                                    ornare, pellentesque velit eget, vestibulum est. Donec pretium tristique elit eget
                                    sodales. Pellentesque posuere.</p>
                            </div>
                            <div class="tab-pane-item">
                                <h2>Easy to use</h2>
                                <p>Aliquam massa massa, consectetur non mattis fringilla, sodales ac turpis. Morbi ac
                                    felis sagittis, faucibus mauris vitae, placerat mauris.</p>
                            </div>
                        </div>


                        <div class="tab-pane" id="tab02" role="tabpanel">
                            <div class="tab-pane-item">
                                <h2>Compatible Browsers</h2>
                                <p>Nam maximus elit a metus luctus, a faucibus magna mattis. Ut malesuada viverra
                                    iaculis. Nunc euismod sit amet neque a tincidunt.</p>
                            </div>
                            <div class="tab-pane-item">
                                <h2>User Friendly</h2>
                                <p>Maecenas maximus velit lorem, quis pharetra turpis fringilla id. Vestibulum tempor
                                    facilisis efficitur. Sed nec nisi sit amet nibh pellentesque elementum.</p>
                            </div>
                            <div class="tab-pane-item">
                                <h2>HTML5 & CSS3</h2>
                                <p>In viverra ipsum ornare sapien rhoncus ullamcorper. Vivamus vitae risus ac mi
                                    vehicula sagittis. Nulla dictum magna sit amet pharetra aliquam.</p>
                            </div>
                        </div>

                        <div class="tab-pane" id="tab03" role="tabpanel">
                            <div class="tab-pane-item">
                                <h2>Quick Support</h2>
                                <p>Mauris rutrum est at fringilla pulvinar. Nam ligula urna, lobortis non scelerisque
                                    vel, molestie eu massa. Nullam mattis elit at tortor accumsan.</p>
                            </div>
                            <div class="tab-pane-item">
                                <h2>Managed Stuffs</h2>
                                <p>Quisque ullamcorper sem quis sapien cursus efficitur. Sed id sodales ipsum. Morbi
                                    eleifend tempus erat sit amet vehicula. Nulla at posuere tellus, non mattis erat.
                                    Nulla id massa gravida.</p>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-md-6 col-sm-6">
                    <div class="feature-image">
                        <img src="images/feature-mockup.png" class="img-responsive" alt="Thin Laptop">
                    </div>
                </div>

            </div>
        </div>
    </section>


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