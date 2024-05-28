<link rel="stylesheet" href="app/css/cards.css">

<div class="big-bookcard">
    <img src="<?= $book['coverUrl'] ?>" alt="" class="bookcard-img">
    <div class="content">
        <header class="content_header">
            <p class="content_header-author">
                <?= $book["author"] ?>
            </p>
            <p class="content_header-book-title">
                <?= $book["title"] ?>
            </p>
        </header>
    </div>
</div>