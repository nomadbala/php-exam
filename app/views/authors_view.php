<link rel="stylesheet" href="app/css/header.css">
<link rel="stylesheet" href="app/css/authors.css">
<link rel="stylesheet" href="app/css/footer.css">

<?php include "app/templates/header_template.php"; ?>

<main>
    <ol>
        <?php foreach ($data as $author): ?>
            <li>
                <?php include "app/templates/author_card.php" ?>
            </li>
        <?php endforeach; ?>
    </ol>
</main>

<?php include "app/templates/footer_template.php"; ?>