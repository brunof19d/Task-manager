<?php

/**
 * @var \App\View\Home $services
 * @var \App\Entity\Service $service
 */

?>

<section id="feature" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row">

            <div class="col-md-12 col-sm-12">
                <div class="section-title">
                    <h1>What you get</h1>
                </div>
            </div>

            <div class="col-md-6 col-sm-6">
                <div class="tab-content">
                    <div class="tab-pane active" id="tab01" role="tabpanel">

                        <?php foreach ($services as $service): ?>
                            <?php if ($service->getActive() === 1): ?>
                                <div class="tab-pane-item">
                                    <h2><?= $service->getName(); ?></h2>
                                    <p><?= nl2br($service->getText()); ?></p>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>

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
