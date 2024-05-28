<link rel="stylesheet" href="app/css/header.css">
<link rel="stylesheet" href="app/css/profile.css">
<link rel="stylesheet" href="app/css/footer.css">

<?php include "app/templates/header_template.php"; ?>

<main>
    <h1>
        Hello,
        <?= $data["name"]; ?>
    </h1>
    <h2>Your subscription status:
        <?php echo $data["subscriptionId"] !== null ? "Activated" : "Non activated"; ?>
    </h2>
    <form action="http://localhost:8080/itstep/exam/app/api/methods/unsetFromSession.php" method="post" id="exitForm"
        name="exitForm">
        <button id="exit-account-btn" type="submit">Exit</button>
    </form>
    <?php if ($data["subscriptionId"] === null): ?>
        <a href="http://localhost:8080/itstep/exam/payment" class="subscription-btn">Get subscription</a>
    <?php endif; ?>
</main>

<script src="app/js/profile.js"></script>

<?php include "app/templates/footer_template.php"; ?>