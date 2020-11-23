<?php

/**
 * @var \App\View\Home $portfolios
 * @var \App\Entity\Portfolio $portfolio
 * @var \App\View\Home $pagesCount
 */

?>

<section id="portfolio">
    <div class="container">

        <div class="row">

            <?php foreach ($portfolios as $portfolio): ?>
                    <article class="card col-md-4">

                        <?php if (empty($portfolio->getPhoto())): ?>
                            <img src="https://placehold.it/600x400" class="img-responsive">
                        <?php else: ?>
                            <img class="img-responsive" width="600" height="40" src="files_uploaded/portfolio/<?= $portfolio->getPhoto(); ?>">
                        <?php endif; ?>

                        <div class="card-body">
                            <h1 class="h3"><?= $portfolio->getTitle(); ?></h1>
                            <time>Published in: <?= $portfolio->getDate()->format('d/m/Y'); ?></time>
                            <em>Category: <?= $portfolio->getCategory()->getName(); ?></em>
                            <p><?= nl2br($portfolio->getDescription()); ?></p>
                            <a href="#" class="btn btn-primary">View Project</a>
                        </div>

                    </article>
            <?php endforeach; ?>

        </div>

        <nav class="nav-pagination">
            <ul class="pagination">
                <?php for ($page = 1; $page <= $pagesCount; $page++): ?>
                    <li class="page-item">
                        <a class="page-link" href="/home?page=<?= $page; ?>#portfolio">
                            <?= $page; ?>
                        </a>
                    </li>
                <?php endfor; ?>
            </ul>
        </nav>

    </div>
</section>
