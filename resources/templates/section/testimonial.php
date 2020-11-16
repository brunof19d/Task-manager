<?php

/**
 * @var \App\View\Home $testimonials
 * @var \App\Entity\Testimonial $testimonial
 */

?>

<section id="testimonial" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row">

            <div class="col-md-6 col-sm-12">
                <div class="testimonial-image"></div>
            </div>

            <div class="col-md-6 col-sm-12">
                <div class="testimonial-info">

                    <div class="section-title">
                        <h1>What People Say</h1>
                    </div>

                    <div class="owl-carousel owl-theme">

                        <?php foreach ($testimonials as $testimonial): ?>
                            <div class="item">

                                <!-- Text Testimonial -->
                                <h3><?= nl2br($testimonial->getText()); ?></h3>

                                <div class="testimonial-item">

                                    <!-- Image Person -->
                                    <?php if (empty($testimonial->getPhoto())): ?>
                                        <img src="https://placehold.it/100x100" class="img-responsive" alt="photo_person">
                                    <?php else: ?>
                                        <img src="/files_uploaded/<?= $testimonial->getPhoto(); ?>" class="img-responsive" alt="photo_person">
                                    <?php endif; ?>

                                    <!-- Name Person -->
                                    <h4><?= $testimonial->getName(); ?></h4>

                                </div>

                            </div>
                        <?php endforeach; ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
