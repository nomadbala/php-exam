<link rel="stylesheet" href="app/css/cards.css">



<div class="bookcard">
    <img src="<?= $book["coverUrl"] ?>" alt="">
    <div class="content">
        <p class="author">
            <?= $book["author"] ?>
        </p>
        <p class="title">
            <?= $book["title"]; ?>
        </p>
    </div>
</div>