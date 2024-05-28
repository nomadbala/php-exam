<link rel="stylesheet" href="app/css/cards.css">

<div class="author_card">
    <img src="<?= $author["photo"] ?>" alt="">
    <div class="content">
        <h2>
            <?= $author["name"] ?>
        </h2>
        <p>
            <?= $author["bio"]; ?>
        </p>
    </div>
</div>