<?php

/**
 * @var \App\View\Home $employees
 * @var \App\Entity\Employee $employee
 */

?>
<section id="about" data-stellar-background-ratio="0.5">

    <div class="container">
        <div class="row">

            <div class="col-md-offset-3 col-md-6 col-sm-12">
                <div class="section-title">
                    <h1>Professional Team for you</h1>
                </div>
            </div>

            <?php foreach ($employees as $employee): ?>

                <?php if ($employee->getActive() === 1): ?>

                <div class="col-md-4 col-sm-4">
                    <div class="team-thumb">

                        <?php if (empty($employee->getPhoto()) === FALSE): ?>
                            <img src="/files_uploaded/team/<?= $employee->getPhoto(); ?>" class="img-responsive" alt="Employee"/>
                        <?php else: ?>
                            <img src="https://placehold.it/323x340" width="323" class="img-responsive" alt="Employee"/>
                        <?php endif; ?>

                        <div class="team-info team-thumb-up">
                            <h2><?= $employee->getName(); ?></h2>
                            <small><?= $employee->getJobPosition(); ?></small>
                            <p><?= $employee->getDescription(); ?></p>
                        </div>

                    </div>
                </div>

                <?php endif; ?>

            <?php endforeach; ?>


        </div>
    </div>

</section>
