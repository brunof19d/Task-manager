<?php

require_once __DIR__ . '/../../../includes/header-admin.php';
/**
 * @var \App\View\Admin\Contact\TableContact $contacts
 * @var \App\Entity\Contact $contact
 */

?>

<div class="jumbotron container p-5 mb-5">
    <h1 class="h2">Contact</h1>
    <hr>
    <p class="lead mb-0">Check below all the messages felt by the website's contact form.</p>
</div>
<div class="container">
    <?php require_once __DIR__ . '/../../../includes/alert-message.php'; ?>
    <table class="table table-striped">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Message</th>
            <th scope="col">Date</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($contacts as $contact): ?>
        <tr>
            <th scope="row"><?= $contact->getId(); ?></th>
            <td><?= $contact->getName(); ?></td>
            <td><?= $contact->getEmail(); ?></td>
            <td><?= nl2br($contact->getText()); ?></td>
            <td><?= $contact->getDate()->format('d/m/Y'); ?></td>
            <td>
                <a href="/delete-contact?id=<?= $contact->getId(); ?>" class="btn btn-danger" title="Delete">
                    <i class="far fa-trash-alt"></i>
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
