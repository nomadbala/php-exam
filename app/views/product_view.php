<link rel="stylesheet" href="app/css/header.css">
<link rel="stylesheet" href="app/css/product.css">
<link rel="stylesheet" href="app/css/footer.css">

<?php include "app/templates/header_template.php"; ?>

<main>

    <?php if ($data["access"] == 1): ?>

        <img src="<?= $data["data"]["coverUrl"] ?>" alt="">
        <div class="content">
            <p class="title js-select">
                <?= $data["data"]["title"]; ?> (
                <?= $data["data"]["releaseDate"]; ?> )
            </p>
            <p class="author js-select">
                <?= $data["data"]["author"]; ?>
            </p>
            <p class="story">
                <?= $data["data"]["story"]; ?>
            </p>
            <form action="http://localhost:8080/itstep/exam/app/api/methods/addToFavorites.php" method="post" id="mainForm"
                name="mainForm">
                <button id="addToFavorites" type="submit">Add to Favorites</button>
            </form>
        </div>


    <?php else: ?>

        <h1 style="color: white; font-size: 36px;">Sorry, you have to login/register or buy subscription</h1>

    <?php endif; ?>

</main>

<script src="app/js/product.js"></script>

<?php include "app/templates/footer_template.php"; ?>